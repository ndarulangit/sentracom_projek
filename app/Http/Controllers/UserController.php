<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function sparepart(Request $request){
        DB::statement("SET SQL_MODE=''");
        // $sp = DB::table('spareparts');
        $cr = $request->get('nama_sparepart');
        $order = $request->get('subpro');
        $fltr  = DB::table('spareparts')->select('*')
        ->groupBy('nama')
        ->get();
        // ->distinct()
        if (isset($cr)) {
            $fltr2 = DB::table('spareparts')->select('*')
            ->where('nama', 'LIKE', '%'.$cr.'%')
            ->get();
            // dump($fltr2);
            return view('users.sparepart_1', compact('fltr', 'fltr2', 'cr'));
        }
        else{
            // $fltr2 = DB::table('spareparts')->select('*')
            // ->where('id', 0)
            // ->get();
            // dump($fltr2);
            return view('users.sparepart_1', compact('fltr',  'cr'));
        }
    }
    public function order(Request $request){
        $order = $request->get('subpro');
        DB::statement("SET SQL_MODE=''");
        $item = DB::table('spareparts')->select('*')
        ->where('id', $order)
        ->get();
        // dd($item);
        return view('users.sparepart_2', compact('item'));
    }
    public function checkout_sv(){
        $user = Auth::guard('user')->user();
        $user = collect($user);
        $sv = DB::table('services')
        ->select('services.code', 'services.ket', 'services.booking', 'services.status', 'services.amount',
         'users.name', 'users.email', 'users.alamat')
         ->join('users', 'users.id', '=', 'services.user_id')
         ->where('services.user_id', '=', $user['id'])
        ->orderBy('services.created_at', 'DESC')->get();
        // dd($sv);
        return view('users.checkout_sv', compact('sv'));
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
    
