<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Order;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Validasi;
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
            return view('users.sparepart', compact('fltr', 'fltr2', 'cr'));
        }
        else{
            return view('users.sparepart', compact('fltr',  'cr'));
        }
    }
    public function order(Request $request){
        $t_order = $request->get('id');
        $client = collect(Auth::guard('user')->id());
        if ($t_order) {
                $order = new Order;
                $order -> user_id = $client['0'];
                $order -> sparepart_id = $t_order;
                $order -> jumlah = 1;
                $order ->save();
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
        // dd($inv);
        return view('users.invoice', compact('inv'));
    }
    public function sv_order(Request $request){
        if ($request->get('order')) {
            if (Validasi::where('service_id', $request->get('order'))->get()[0]->order_id != null) {
                $o = explode(" ", DB::table('validasis')->select('order_id')->where('service_id', $request->get('order'))->get()[0]->order_id);
                $x = DB::table('orders')->select('orders.created_at', 'orders.user_id', 'orders.id',
                    'orders.status', 'users.name', 'users.alamat', 'users.email', 'users.nowa', 'orders.jumlah', 
                    'spareparts.harga', 'spareparts.nama', 'spareparts.merek')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->join('spareparts', 'spareparts.id', '=', 'orders.sparepart_id')->whereIn('orders.id', $o)->get();
                    $y = DB::table('services')->select('services.created_at', 'services.user_id', 'services.id',
                    'services.status', 'users.name', 'users.alamat', 'users.email', 'users.nowa',
                    'services.amount', 'services.code', 'services.type')
                    ->join('users', 'users.id', '=', 'services.user_id')
                    ->where('services.id', $request->get('order'))->get();
                    // dd($y);
                    return view('users.invoice_sv', compact('x', 'y'));
            }else{
                // $o = 1;
                // $x = DB::table('orders')->select('orders.created_at', 'orders.user_id', 'orders.id',
                //     'orders.status', 'users.name', 'users.alamat', 'users.email', 'users.nowa', 'orders.jumlah', 
                //     'spareparts.harga', 'spareparts.nama', 'spareparts.merek')
                //     ->join('users', 'users.id', '=', 'orders.user_id')
                //     ->join('spareparts', 'spareparts.id', '=', 'orders.sparepart_id')->where('orders.id', $o)->get();
                    $x = null;
                    $y = DB::table('services')->select('services.created_at', 'services.user_id', 'services.id',
                    'services.status', 'users.name', 'users.alamat', 'users.email', 'users.nowa',
                    'services.amount', 'services.code', 'services.type')
                    ->join('users', 'users.id', '=', 'services.user_id')
                    ->where('services.id', $request->get('order'))->get();
                    // dd($y);
                    return view('users.invoice_sv', compact('x', 'y'));
            }
            
        }
    }
    public function sv_order_post(Request $request, $total){
        $vali = $request->get('order');
        if (!$vali) {
            Alert::error('Gagal', 'Orderan gagal di checkout');
            return redirect()->route('user.cekot.sv');
        } else {
            if (!($request->file('bukti'))) {
                Alert::warning('Gagal', 'Bukti transfer belum diunggah');
                return redirect()->route('user.cekot.sv');

            }
            else{
            $file = $request->file('bukti');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            DB::table('validasis')->where('service_id', $request->get('order'))->update([
                'bukti' => $filename,
                'total' => $total+14000
            ]);
            DB::table('services')->where('id', $request->get('order'))->update([
                'status' => 'validate'
            ]);
            Alert::success('Berhasil','Orderan sedang divalidasi');
            return redirect()->route('user.cekot.sv');
            }
        }
    }
    public function invoice_post(Request $request, $total){
        $vali = $request->get('order');
        $a = [];
        if (!$vali) {
            DB::table('invoices')->truncate();
            Alert::error('Gagal', 'Orderan gagal di checkout');
            return redirect()->route('cekot.sp');
        } else {
            if (!($request->file('bukti'))) {
                Alert::warning('Gagal', 'Bukti transfer belum diunggah');
                return redirect()->route('user.invoice');
            }
            else{
            $file = $request->file('bukti');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $invo = DB::table('invoices')->get();
            for ($i=0; $i <count($invo) ; $i++) { 
                $jml = DB::table('orders')->select('jumlah') 
                ->where('id', $invo[$i]->order_id)
                ->get();
                DB::table('spareparts')
                ->join('orders', 'orders.sparepart_id', '=', 'spareparts.id')
                ->where('orders.id', $invo[$i]->order_id)->decrement('spareparts.jumlah', $jml['0']->jumlah);
                DB::table('orders')
                ->where('id', $invo[$i]->order_id)->update([
                    "status" => "Validate"
                ]);
                array_push($a, $invo[$i]->order_id);
            }

            $validasi = new Validasi;
            $validasi->user_id = collect(Auth::guard('user')->user())['id'];
            $validasi->bukti = $filename;
            $validasi->order_id = implode(" ", $a);
            $validasi->total = $total+14000;
            $validasi->save();
            DB::table('invoices')->truncate();

            Alert::success('Berhasil','Orderan sedang divalidasi');
            return redirect()->route('cekot.sp');
            }
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
         ->whereIn('status', ['pending', 'checking', 'in process', 'validate', 'finish', 'send', 'confirm'])
        ->orderBy('services.created_at', 'DESC')->get();
        $sv1 = DB::table('services')
        ->select('services.id', 'services.code', 'services.type', 'services.ket', 'services.booking', 'services.status', 'services.amount',
         'users.name', 'users.email', 'users.alamat')
         ->join('users', 'users.id', '=', 'services.user_id')
         ->where('services.user_id', '=', $user['id'])
         ->whereIn('status', ['cancel', 'complete'])
        ->orderBy('services.created_at', 'DESC')->get();
        return view('users.checkout_sv', compact('sv', 'sv1'));
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
         ->where('status', 'pending')
        ->orderBy('orders.created_at', 'DESC')->get();
        $sp1 = DB::table('orders')
        ->select( 'orders.id', 'orders.status', 'orders.jumlah', 'spareparts.nama', 'spareparts.merek', 'spareparts.harga',
         'users.name', 'users.email', 'users.alamat')
         ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
         ->join('users', 'users.id', '=', 'orders.user_id')
         ->where('orders.user_id', '=', $user['id'])
         ->where('status', 'NOT LIKE', 'pending')
        ->orderBy('orders.created_at', 'DESC')->get();
        return view('users.checkout_sp', compact('sp', 'sp1'));
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
        Alert::warning('Gagal', 'Anda belum memilih orderan untuk diproses');
        return redirect()->route('cekot.sp');
       }
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
    
