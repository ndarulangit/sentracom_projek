<?php

namespace App\Http\Controllers;

use App\Models\invoice;
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
        if (isset($t_order)&&isset($jml)) {
            for ($i=0; $i < count($t_order) ; $i++) { 
                $order = new Order;
                $order -> user_id = $client['0'];
                $order -> sparepart_id = $t_order[$i];
                $order -> jumlah = $jml[$i];
                $order ->save();
            }
            Alert::success('Berhasil!!', 'Orderan anda berhasil');
            return redirect()->route('user.sp');
            # code...
        } else{
            Alert::error('Gagal!!', 'Anda belum memilih produk');
            return redirect()->route('user.sp');
        }
    }
    public function invoice(){
        $inv = DB::table('invoices')
        ->select('invoices.created_at', 'invoices.user_id', 'invoices.order_id', 
        'orders.status','users.name', 'users.alamat', 'users.email', 'users.nowa', 'orders.jumlah',
        'spareparts.harga', 'spareparts.nama', 'spareparts.merek')
        ->join('users', 'users.id','=', 'invoices.user_id')
        ->join('orders', 'orders.id', '=', 'invoices.order_id')
        ->join('spareparts', 'spareparts.id', '=', 'orders.sparepart_id')
        ->where('invoices.user_id', collect(Auth::guard('user')->user())['id'])
        ->get();
        return view('users.invoice', compact('inv'));
    }
    public function invoice_post(Request $request){
        // $bukti = $request->get('bukti');
        $vali = $request->get('order');
        
        if (!$vali) {
            DB::table('invoices')->truncate();
        } else {
            $inv = DB::table('invoices')->get();
            for ($i=0; $i <count($inv) ; $i++) { 
                # code...
                $jml = DB::table('orders')->select('jumlah') 
                ->where('id', $inv[$i]->order_id)
                ->get();
                DB::table('spareparts')
                ->join('orders', 'orders.sparepart_id', '=', 'spareparts.id')
                ->where('orders.id', $inv[$i]->order_id)->decrement('spareparts.jumlah', $jml['0']->jumlah);
                DB::table('orders')
                ->where('id', $inv[$i]->order_id)->update([
                    "status" => "Validate"
                ]);
                DB::table('invoices')->truncate();
            }
        }
        // dd($vali);
        // if ($_POST('order')) {
        //     DB::table('invoices')->truncate();
        // }elseif ($_POST('cancel')) {
        //     DB::table('invoices')->truncate();
        // }
        // return redirect()->route('cekot.sp');

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
        ->select( 'orders.id', 'orders.status', 'orders.jumlah', 'spareparts.nama', 'spareparts.merek', 'spareparts.harga',
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
    public function sp_order(Request $request){
       $ck = $request->get('cekot');
       $us = collect(Auth::guard('user')->user());
       if (isset($ck)) {
           for ($i=0; $i < count($ck) ; $i++) { 
               // # code...
                $invoice = new invoice;
                $invoice->user_id = $us['id'];
                $invoice->order_id = $ck[$i];
                $invoice->save();
            }
            return redirect()->route('user.invoice');
       }
       else{
        return redirect()->route('cekot.sp');
       }
    //    dd($us['id']);
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
            Alert::success('Berhasil!!', 'Data anda berhasil di update');
            return redirect()
                ->route('user.profile');
        }
    }
}
    
