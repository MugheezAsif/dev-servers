<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function companyIndex()
    {
        $page = 'company';
        $total = Server::where('for', 'company')->count();
        $customers = Server::where('for', 'company')->distinct('customer')->count('customer');
        return view('servers.company', compact('page', 'total', 'customers'));
    }

    public function customerIndex()
    {
        $page = 'customer';
        $total = Server::where('for', 'customer')->count();
        $customers = Server::where('for', 'customer')->distinct('customer')->count('customer');
        return view('servers.customer', compact('page', 'total', 'customers'));
    }

    public function list(Request $request)
    {
        $query = Server::where('for', $request->for);
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
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $domains = $query->orderBy('id', 'desc')->paginate(10);
        return response()->json($domains);
    }

    public function store(Request $request)
    {
        $request->validate([
            'for' => 'required|in:company,customer',
            'domain' => 'required|string',
            'name' => 'required|string',
            'customer' => 'required|string',
            'mobile' => 'required|string',
            'project' => 'required|string',
            'purchase_date' => 'required|date',
            'renewal_date' => 'required|date',
            'renewal_amount' => 'required|numeric',
        ]);

        Server::updateOrCreate(['id' => $request->id], $request->all());

        return redirect()->back()->with('success', 'Server added successfully!');
    }

    public function delete($id)
    {
        Server::findOrFail($id)->delete();
        return response()->json(['success' => 'Server deleted successfully!']);
    }

    public function hide($id)
    {
        $domain = Server::findOrFail($id);
        if ($domain->hidden) {
            $domain->hidden = 0;
        } else {
            $domain->hidden = 1;
        }
        $domain->save();
        return response()->json(['success' => 'Server deleted successfully!']);
    }

    public function renew($id, $months)
    {
        $domain = Server::findOrFail($id);
        $domain->renewal_date = $domain->renewal_date->addMonths($months);
        $domain->save();
        return response()->json(['success' => 'Server renewed successfully!']);
    }
}
