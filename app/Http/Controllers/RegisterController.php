<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{   
    public function index(){
        return view('users.register', [
        'title'=> 'Register',
        'active'=> 'register'
        ]);
    }
    public function store(Request $request){
       $usercreate =  $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        $usercreate['password']= Hash::make($usercreate['password']);
        User::create($usercreate);
        return redirect(route('user.login'));
    }
}