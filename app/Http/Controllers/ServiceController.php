<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use Alert;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('user');
    }
    public function service(){
        return view ('users.service_1');
    }
    public function orderse(Request $request){
        $client = Auth::guard('user')->user();
        $client = collect($client);
        
        $service  = new Service;
        $service -> user_id = $client['id'];
        $service -> code = $request->get('code');
        $service -> type = $request->get('type');
        $service -> booking = $request->get('mdate');
        $service -> ket = $request->get('ket');

        $service->save();
        if ($service->save()) {
            Alert::success('Berhasil!!', 'Orderan anda berhasil dikirim');
            return view ('users.service_1', compact('service'));
        }
        // dd($service);
    }
}
