<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function database(){
        return view('admin.datasp');
    }
    public function history(){
        return view('admin.history');
    }
    public function orderan(){
        // $y = DB::table('validasis')->select('order_id')->where('id', 3)->get();
        $x = DB::table('validasis')->select('validasis.id', 'users.name', 'users.alamat', 
        'validasis.order_id', 'validasis.total', 'validasis.bukti')
        ->join('users', 'users.id', '=', 'validasis.user_id')->get();
        return view('admin.orderan', compact('x'));
    }
    public function konfirmasi(Request $request){
        if (!$request->get('acc')) {
            $order_id = DB::table('validasis')->select('order_id')->where('id', $request->get('dc'))->get();
            $order_id = explode(" ", $order_id[0]->order_id);

            for ($i=0; $i < count($order_id) ; $i++) { 
                # code...
                $jml = DB::table('orders')->select('jumlah') 
                ->where('id', $order_id[$i])
                ->get();
                DB::table('spareparts')
                ->join('orders', 'orders.sparepart_id', '=', 'spareparts.id')
                ->where('orders.id', $order_id[$i])->increment('spareparts.jumlah', $jml['0']->jumlah);
                DB::table('orders')
                ->where('id', $order_id[$i])->update([
                    "status" => "canceled"
                ]);
            DB::table('validasis')->where('id', $request->get('dc'))->delete();
            } return redirect()->route('orderan.admin');
        }else{
            $order_id = DB::table('validasis')->select('order_id')->where('id', $request->get('acc'))->get();
            $order_id = explode(" ", $order_id[0]->order_id);

            for ($i=0; $i < count($order_id) ; $i++) { 
                # code...
                DB::table('orders')
                ->where('id', $order_id[$i])->update([
                    "status" => "confirm"
                ]);
            DB::table('validasis')->where('id', $request->get('acc'))->delete();
            }return redirect()->route('orderan.admin');
        }
    }
    public function register(){
        return view('admin.register');
    }
    public function track(){
        $itm = DB::table('orders')
        ->select( 'orders.id', 'orders.status', 'spareparts.nama', 'spareparts.merek',
         'users.name', 'users.email', 'users.alamat')
         ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
         ->join('users', 'users.id', '=', 'orders.user_id')
         ->whereIn('status', ['confirm', 'cancel', 'complete', 'send'])->get();
        //  dd($itm);
        return view('admin.tracking', compact('itm'));
    }
    public function track_post(Request $request){
        if ($request->get('send')) {
            DB::table('orders')
            ->where('id', $request->get('send'))->update([
                "status" => "send"
            ]);
            return redirect()->route('tracking.admin');
        }elseif ($request->get('complete')) {
            DB::table('orders')
            ->where('id', $request->get('complete'))->update([
                "status" => "complete"
            ]);
            return redirect()->route('tracking.admin');
        }elseif ($request->get('cancel')) {
            DB::table('orders')
            ->where('id', $request->get('cancel'))->update([
                "status" => "cancel"
            ]);
            return redirect()->route('tracking.admin');
        }
    }
}
