<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
     return view('login.login');
    }
    public function step(Request $request){
        if ($request->get('select') == "AL") {
            # code...
            return redirect()->route('admin.login');
        }
        elseif ($request->get('select') == "WY") {
            # code...
            return redirect()->route('teknisi.login');
        }
    }
}
