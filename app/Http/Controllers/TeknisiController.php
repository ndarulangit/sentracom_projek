<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function __construct(){
        $this->middleware('teknisi');
    }
    public function home(){
        return view('teknisi.dashboard_teknisi');
    }
}
