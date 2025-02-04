<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $page = 'payments';
        $total = Payment::count();
        return view('payments.index', compact('page', 'total'));
    }

    public function list(Request $request)
    {
        $query = Payment::query();
        if ($request->search) {
            $query->where('customer', 'like', '%' . $request->search . '%');
        }
        $domains = $query->orderBy('id', 'desc')->paginate(10);
        return response()->json($domains);
    }
}
