<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeknisiController extends Controller
{
    public function __construct(){
        $this->middleware('teknisi');
    }
    public function datasv(){
        $sv = DB::table('services')->select('services.id', 'services.booking', 'services.ket', 
        'services.amount', 'services.code', 'services.type', 'users.name', 'users.alamat')
        ->join('users', 'users.id', '=', 'services.user_id')
        ->where('services.status', 'pending')
        ->where('services.teknisi_id', 1)
        ->get();
        // dd($sv);
        return view('teknisi.dashboard_teknisi', compact('sv'));
    }
    public function take(Request $request){
        DB::table('services')->where('id', $request->get('take'))->update([
            'status' => 'checking',
            'teknisi_id' => Auth::guard('teknisi')->user()['id']
        ]);
        return redirect()->route('dashboard.teknisi');
    }
    public function myservice(){
        $sv = DB::table('services')->select('services.id', 'services.booking', 'services.ket', 'services.status',
        'services.amount', 'services.code', 'services.type', 'users.name', 'users.alamat')
        ->join('users', 'users.id', '=', 'services.user_id')
        ->whereIn('services.status', ['checking', 'confirm', 'in process'])
        ->where('services.teknisi_id', Auth::guard('teknisi')->user()['id'])
        ->get();
        return view('teknisi.myservice', compact('sv'));
    }
    public function valid(){
        $sv = DB::table('validasis')->select( 'validasis.bukti', 'validasis.total' , 'services.id', 'services.booking', 'services.ket', 'services.status',
        'services.amount', 'services.code', 'services.type', 'users.name', 'users.alamat')
        ->join('services', 'services.id', '=', 'validasis.service_id')
        ->join('users', 'users.id', '=', 'validasis.user_id')
        ->whereIn('services.status', ['validate', 'finish', 'confirm', 'send'])
        ->where('services.teknisi_id', Auth::guard('teknisi')->user()['id'])
        ->whereNotNull('validasis.service_id')
        ->get();
        // dd($sv);
        return view('teknisi.tracking', compact('sv'));    
    }
    public function valid_p(Request $request){
        if ($request->get('cf')) {
            if (Validasi::where('service_id', $request->get('cf'))->get()[0]->order_id != null) {
                # code...
                $o = explode(" ", DB::table('validasis')->select('order_id')->where('service_id', $request->get('cf'))->get()[0]->order_id);
                for ($i=0; $i <count($o) ; $i++) { 
                    # code...
                    DB::table('orders')->where('id', $o[$i])->update([
                        'status' => 'confirm'
                    ]);
                }
                DB::table('services')->where('id', $request->get('cf'))->update([
                    'status' => 'confirm'
                ]);
                return redirect()->route('teknisi.valid');
            }else {
                # code...
                DB::table('services')->where('id', $request->get('cf'))->update([
                    'status' => 'confirm'
                ]);
                return redirect()->route('teknisi.valid');
            }
        }
        elseif ($request->get('sd')) {
            if (Validasi::where('service_id', $request->get('sd'))->get()[0]->order_id != null) {
                # code...
                $o = explode(" ", DB::table('validasis')->select('order_id')->where('service_id', $request->get('sd'))->get()[0]->order_id);
                for ($i=0; $i <count($o) ; $i++) { 
                    # code...
                    DB::table('orders')->where('id', $o[$i])->update([
                        'status' => 'send'
                    ]);
                }
                DB::table('services')->where('id', $request->get('sd'))->update([
                    'status' => 'send'
                ]);
                return redirect()->route('teknisi.valid');
            }else {
                # code...
                DB::table('services')->where('id', $request->get('sd'))->update([
                    'status' => 'send'
                ]);
                return redirect()->route('teknisi.valid');
            }
        }
        elseif ($request->get('cp')) {
            if (Validasi::where('service_id', $request->get('cp'))->get()[0]->order_id != null) {
                # code...
                $o = explode(" ", DB::table('validasis')->select('order_id')->where('service_id', $request->get('cp'))->get()[0]->order_id);
                for ($i=0; $i <count($o) ; $i++) { 
                    # code...
                    DB::table('orders')->where('id', $o[$i])->update([
                        'status' => 'complete'
                    ]);
                }
                DB::table('services')->where('id', $request->get('cp'))->update([
                    'status' => 'complete'
                ]);
                return redirect()->route('teknisi.valid');
            }else {
                # code...
                DB::table('services')->where('id', $request->get('cp'))->update([
                    'status' => 'complete'
                ]);
                Validasi::where('service_id', $request->get('cp'))->delete();
                return redirect()->route('teknisi.valid');
            }
        }
        elseif($request->get('cc')){
            if (Validasi::where('service_id', $request->get('cc'))->get()[0]->order_id != null) {
                # code...
                $o = explode(" ", DB::table('validasis')->select('order_id')->where('service_id', $request->get('cc'))->get()[0]->order_id);
                for ($i=0; $i <$o ; $i++) { 
                    # code...
                    DB::table('orders')->where('id', $o[$i])->update([
                        'status' => 'cancel'
                    ]);
                    DB::table('spareparts')->where('id', DB::table('orders')->select('sparepart_id')
                    ->where('order_id', $o[$i])->get()[0]->sparepart_id)->increment('jumlah', DB::table('orders')->select('sparepart_id')
                    ->where('order_id', $o[$i])->get()[0]->jumlah);
                }
                DB::table('services')->where('id', $request->get('cc'))->update([
                    'status' => 'cancel'
                ]);
                return redirect()->route('teknisi.valid');
            }else {
                # code...
                DB::table('services')->where('id', $request->get('cc'))->update([
                    'status' => 'cancel'
                ]);
                Validasi::where('service_id', $request->get('cc'))->delete();
                return redirect()->route('teknisi.valid');
            }
    }
    }
    public function confirm(Request $request){
        if ($request->get('sb')) {
            DB::table('services')->where('id', $request->get('sb'))
            ->where('teknisi_id', Auth::guard('teknisi')->user()['id'])->update([
                'status' => 'in process'
            ]);
            return redirect()->route('teknisi.myservice');
        }elseif ($request->get('cp')) {
            $q = DB::table('services')->where('id', $request->get('cp'));
                # code...
                $val = new Validasi;
                if($val::where('service_id', $request->get('cp'))->exists()){
                    DB::table('services')->where('id', $request->get('cp'))
                    ->where('teknisi_id', Auth::guard('teknisi')->user()['id'])->update([
                        'status' => 'finish',
                        'amount' => $request->get('harga')
                    ]);
                return redirect()->route('teknisi.myservice');
                }else{
                DB::table('services')->where('id', $request->get('cp'))
                ->where('teknisi_id', Auth::guard('teknisi')->user()['id'])->update([
                    'status' => 'finish',
                    'amount' => $request->get('harga')
                ]);
                $val->user_id = $q->get()[0]->user_id;
                $val->service_id = $request->get('cp');
                $val->save();
                return redirect()->route('teknisi.myservice');
                }
        }elseif ($request->get('ts')) {
            $s = $request->get('ts');
            $sp = DB::table('spareparts')->select('*')->get();
            return view('teknisi.sparepart', compact('s', 'sp'));
        }
        elseif ($request->get('cc')) {
            DB::table('services')->where('id', $request->get('sb'))
            ->where('teknisi_id', Auth::guard('teknisi')->user()['id'])->update([
                'status' => 'cancel'
            ]);
            return redirect()->route('teknisi.myservice');
        }
    }
    public function sp_p(Request $request){
        $itm = $request->get('itm');
        $qty = $request->get('qty');
        $a = [];
        if ($request->get('sl')) {
            if (isset($itm)&&isset($qty)) {
                # code...
                for ($i=0; $i < count($itm) ; $i++) { 
                    $order = new Order;
                    $order -> user_id = DB::table('services')->select('user_id')->where('id', $request->get('sl'))->get()[0]->user_id;
                    $order -> sparepart_id = $itm[$i];
                    $order -> jumlah = $qty[$i];
                    $order ->save();

                }
                $validasi = new Validasi;
                $validasi->user_id = DB::table('services')->select('user_id')->where('id', $request->get('sl'))->get()[0]->user_id;
                $x = DB::table('orders')->orderBy('created_at', 'DESC')->get();
                for ($i=0; $i < count($itm) ; $i++) { 
                    array_push($a, $x[$i]->id);
                    DB::table('spareparts')
                    ->join('orders', 'orders.sparepart_id', '=', 'spareparts.id')
                    ->where('orders.id', $x[$i]->id)->decrement('spareparts.jumlah', $x[$i]->jumlah);
                    DB::table('orders')->where('id', $x[$i]->id)->update([
                        'status' => 'validate'
                    ]);
                }
                $validasi->service_id = $request->get('sl');
                $validasi->order_id = implode(" ", $a);
                $validasi->save();
                return redirect()->route('teknisi.myservice');
            }
            else {
                # code...
                return redirect()->route('teknisi.myservice');
            }
        }     
    }
}
