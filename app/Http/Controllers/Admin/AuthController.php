<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('BK.login');
    }
    public function showRegister()
    {
        return view('BK.login');
    }

    public function Login(Request $request)
    {
        $cre = request()->only('email', 'password');
        $checkAuth = Auth::guard('admin')->attempt($cre);
        if (!$checkAuth) {
            return redirect()->back()->with('error', 'Wrong Email and Password');
        } else {
            $adminName = Auth::guard('admin')->user()->name;
            return redirect('/admin/dashboard')->with('success', 'Welcome ' . $adminName);
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}