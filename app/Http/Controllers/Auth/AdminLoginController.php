<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert ;


class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
      if (Auth::guard('admin')->user()) {
        # code...
        return redirect()->route('dashboard.admin');
      }
        return view('login.loginadmin');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.admin');
        }else{
        Alert::error('Failed!!', 'Login Failed');
        return back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect()->route('login');
    }
 }