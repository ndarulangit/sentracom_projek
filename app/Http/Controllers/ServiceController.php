<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use RealRashid\SweetAlert\Facades\Alert ;

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
        $valid = $request->all();
        if (isset($valid['code'])&&isset($valid['mdate'])&&isset($valid['ket'])) {
            $service  = new Service;
            $service -> user_id = $client['id'];
            $service -> teknisi_id = 1;
            $service -> code = $request->get('code');
            $service -> type = $request->get('type');
            $service -> booking = $request->get('mdate');
            $service -> ket = $request->get('ket');
    
            $service->save();
                Alert::success('Berhasil!!', 'Orderan anda berhasil dikirim');
                return view ('users.service_1', compact('service'));
        }
        else{
            Alert::error('Gagal!!', 'Anda gagal melakukan orderan service');
            return redirect()->route('user.service');
        }
        // dd($service);
    }
}
