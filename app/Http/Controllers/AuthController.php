<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Server;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $page = 'dashboard';
        $total_domains = Domain::count();
        $server_payment_total = Server::sum('renewal_amount');
        $total_company_servers = Server::where('for', 'company')->count();
        $total_customer_servers = Server::where('for', 'customer')->count();
        $total_server_users = Server::distinct('customer')->count('customer');
        $cutomer_active_domain = Domain::where('for', 'customer')->where('renewal_date', '>=', now())->count();
        $server_payment_today = Server::where('created_at', '>=', now()->startOfDay())->where('created_at', '<=', now()->endOfDay())->sum('renewal_amount');
        $today_server_users = Server::where('created_at', '>=', now()->startOfDay())->where('created_at', '<=', now()->endOfDay())->distinct('customer')->count('customer');
        $server_payment_yesterday = Server::where('created_at', '>=', now()->subDay()->startOfDay())->where('created_at', '<=', now()->subDay()->endOfDay())->sum('renewal_amount');
        $yesterday_server_users = Server::where('created_at', '>=', now()->subDay()->startOfDay())->where('created_at', '<=', now()->subDay()->endOfDay())->distinct('customer')->count('customer');
        return view('dashboard', compact('page', 'today_server_users', 'yesterday_server_users', 'server_payment_today', 'server_payment_yesterday', 'total_domains', 'total_customer_servers', 'total_company_servers', 'cutomer_active_domain', 'total_server_users', 'server_payment_total'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'pin' => 'required',
        ]);

        $user = User::where('pin', $request->pin)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Success!');
        } else {
            return redirect()->back()->withErrors('Invalid pin.');
        }
    }
}
