<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class TeknisiLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/teknisi/home';

    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
     return Auth::guard('teknisi');
    }
    public function showLoginForm()
    {
        return view('login.logintekn');
    }
 }