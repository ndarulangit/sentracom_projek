<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Alert;


class UserLoginController extends Controller
{

    // use AuthenticatesUsers;
    

    // protected $redirectTo = '/';

    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    // public function guard()
    // {
    //  return Auth::guard('user');
    // }
    public function showLoginForm()
    {
        return view('users.loginuser');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
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
 
        return redirect('/login');
    }
 }