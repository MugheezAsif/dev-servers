<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function companyIndex()
    {
        $page = 'company';
        return view('domains.company', compact('page'));
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
}
