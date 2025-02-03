<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function companyIndex()
    {
        $page = 'company';
        $total = Domain::where('for', 'company')->count();
        $customers = Domain::where('for', 'company')->distinct('customer')->count('customer');
        return view('domains.company', compact('page', 'total', 'customers'));
    }

    public function customerIndex()
    {
        $page = 'customer';
        $total = Domain::where('for', 'customer')->count();
        $customers = Domain::where('for', 'customer')->distinct('customer')->count('customer');
        return view('domains.customer', compact('page', 'total', 'customers'));
    }

    public function list(Request $request)
    {
        $query = Domain::where('for', $request->for);
        if ($request->expiring === 'true') {
            $query->where('renewal_date', '<', now()->addDays(10))
                ->where('renewal_date', '>=', now());
        }
        if ($request->expired === 'true') {
            $query->where('renewal_date', '<', now());
        }
        if ($request->hidden === 'true') {
            $query->where('hidden', true);
        } else {
            $query->where('hidden', false);
        }
        if ($request->search) {
            $query->where('domain', 'like', '%' . $request->search . '%');
        }
        $domains = $query->orderBy('id', 'desc')->paginate(10);
        return response()->json($domains);
    }

    public function store(Request $request)
    {
        $request->validate([
            'for' => 'required|in:company,customer',
            'domain' => 'required|string',
            'customer' => 'required|string',
            'mobile' => 'required|string',
            'project' => 'required|string',
            'purchase_date' => 'required|date',
            'renewal_date' => 'required|date',
            'renewal_amount' => 'required|numeric',
        ]);

        Domain::updateOrCreate(['id' => $request->id], $request->all());

        return redirect()->back()->with('success', 'Domain added successfully!');
    }

    public function delete($id)
    {
        Domain::findOrFail($id)->delete();
        return response()->json(['success' => 'Domain deleted successfully!']);
    }

    public function hide($id)
    {
        $domain = Domain::findOrFail($id);
        if ($domain->hidden) {
            $domain->hidden = 0;
        } else {
            $domain->hidden = 1;
        }
        $domain->save();
        return response()->json(['success' => 'Domain deleted successfully!']);
    }
}
