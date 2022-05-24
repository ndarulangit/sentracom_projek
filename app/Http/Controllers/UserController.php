<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('user');
    }
    public function index(){
        return view ('dashboard');
    }

    public function sparepart(){
        return view('users.sparepart_1');
    }
    public function checkout(){
        return view('users.checkout');
    }
    public function history(){
        return view('users.track');
    }
    public function invoice(){
        return view('users.invoice');
    }
    public function profile(){
        $client = Auth::guard('user')->user();
        $client = collect($client);
        // dd($client);
        return view('users.profile',compact('client'));
    }
}
    
