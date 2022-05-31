<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert ;

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
    public function checkout_sv(){
        return view('users.checkout_sv');
    }
    public function checkout_sp(){
        return view('users.checkout_sp');
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
        $id = $client['id'];
        return view('users.profile',compact('client', 'id'));
    }
    public function update(Request $request, $id)
    {
        $post = User::find($id);
        $post->update([
            'name' => $request->name,
            'Nowa' => $request->nowa,
            'alamat' => $request->alamat,
        ]);

        if ($post->update()) {
            Alert::success('Berhasil!!', 'Orderan anda berhasil dikirim');
            return redirect()
                ->route('user.profile');
        }
    }
}
    
