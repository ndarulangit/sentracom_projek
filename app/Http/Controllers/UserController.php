<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sparepart;
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
        $cr = $request->get('nama_sparepart');
        $order = $request->get('subpro');
        $fltr  = DB::table('spareparts')->select('*')
        ->groupBy('nama')
        ->get();
        if (isset($cr)) {
            $fltr2 = DB::table('spareparts')->select('*')
            ->where('nama', 'LIKE', '%'.$cr.'%')
            ->get();
            return view('users.sparepart_1', compact('fltr', 'fltr2', 'cr'));
        }
        else{
            return view('users.sparepart_1', compact('fltr',  'cr'));
        }
    }
    public function order(Request $request){
        $t_order = $request->get('subpro');
        $client = collect(Auth::guard('user')->id());
        $jml = $request->get('qty');
        for ($i=0; $i < count($t_order) ; $i++) { 
            $order = new Order;
            $order -> user_id = $client['0'];
            $order -> sparepart_id = $t_order[$i];
            $order -> jumlah = $jml[$i];
            $order ->save();
        }
    }
    public function checkout_sv(){
        $user = Auth::guard('user')->user();
        $user = collect($user);
        $sv = DB::table('services')
        ->select('services.id', 'services.code', 'services.ket', 'services.booking', 'services.status', 'services.amount',
         'users.name', 'users.email', 'users.alamat')
         ->join('users', 'users.id', '=', 'services.user_id')
         ->where('services.user_id', '=', $user['id'])
        ->orderBy('services.created_at', 'DESC')->get();
        // dd($sv);
        return view('users.checkout_sv', compact('sv'));
    }
    public function checkout_sp(){
        $user = Auth::guard('user')->user();
        $user = collect($user);
        $sp = DB::table('orders')
        ->select( 'spareparts.id', 'orders.status', 'orders.jumlah', 'spareparts.nama', 'spareparts.merek', 'spareparts.harga',
         'users.name', 'users.email', 'users.alamat')
         ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
         ->join('users', 'users.id', '=', 'orders.user_id')
         ->where('orders.user_id', '=', $user['id'])
        ->orderBy('orders.created_at', 'DESC')->get();
        // dd($sp);
        return view('users.checkout_sp', compact('sp'));
    }
    public function history(){
        return view('users.track');
    }
    public function invoice(Request $request){
        $ck = $request->all('orderan');
        dd($ck);
        // return view('users.invoice');
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
    
