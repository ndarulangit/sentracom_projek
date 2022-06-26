<?php

namespace App\Http\Controllers;

use App\Exports\ServiceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\SparepartExport;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Teknisi;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert ;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function dashboard(){
        $sp = DB::table('orders')->select('*')->get();
        $sp = count($sp);
        $sv = DB::table('services')->select('*')->get();
        $sv = count($sv);
        return view('admin.dashboard', compact('sp', 'sv'));
    }
    public function database(){
        $sp =DB::table('spareparts')->select('*')->get();
        return view('admin.datasp', compact('sp'));
    }
    public function updel(Request $request){
        $sp = new Sparepart;
        if ($request->get('tambah')) {
            if ($request->file('gambarT')!=null && $request->get('deskripsiT')!=null) {
                # code...
                    $file = $request->file('gambarT');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('image'), $filename);
                    $sp->gambar = $filename;
                    $sp->deskripsi = $request->get('deskripsiT');
                    $sp->nama = $request->get('namaT');
                    $sp->merek = $request->get('merekT');
                    $sp->harga = $request->get('hargaT');
                    $sp->jumlah = $request->get('jumlahT');
                    $sp->save();

                    Alert::success('Berhasil', 'Sparepart berhasil ditambahkan');
                    return redirect()->route('data.admin');
            }
            elseif ($request->file('gambarT')||$request->get('deskripsiT')) {
                # code...
                if ($request->file('gambarT') != null) {
                    # code...
                    $file = $request->file('gambarT');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('image'), $filename);
                    $sp->gambar = $filename;
                    $sp->nama = $request->get('namaT');
                    $sp->merek = $request->get('merekT');
                    $sp->harga = $request->get('hargaT');
                    $sp->jumlah = $request->get('jumlahT');
                    $sp->save();
                    Alert::success('Berhasil', 'Sparepart berhasil ditambahkan');
                    return redirect()->route('data.admin');
                }
                elseif ($request->get('deskripsiT')!=null) {
                    # code...
                    $sp->deskripsi = $request->get('deskripsiT');
                    $sp->nama = $request->get('namaT');
                    $sp->merek = $request->get('merekT');
                    $sp->harga = $request->get('hargaT');
                    $sp->jumlah = $request->get('jumlahT');
                    $sp->save();
                    Alert::success('Berhasil', 'Sparepart berhasil ditambahkan');
                    return redirect()->route('data.admin');
                }
            }
            elseif ($request->file('gambarT')==null && $request->get('deskripsiT')==null) {
                # code...
                $sp->nama = $request->get('namaT');
                $sp->merek = $request->get('merekT');
                $sp->harga = $request->get('hargaT');
                $sp->jumlah = $request->get('jumlahT');
                $sp->save();
                Alert::success('Berhasil', 'Sparepart berhasil ditambahkan');
                    return redirect()->route('data.admin');
            }
        }
        elseif ($request->get('update')) {
            if ($request->file('gambar')!=null && $request->get('deskripsi')!=null) {
                # code...
                    $file = $request->file('gambar');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('image'), $filename);
                    $sp::where('id', $request->get('update'))->update([
                    'gambar' => $filename,
                    'deskripsi' => $request->get('deskripsi'),
                    'nama' => $request->get('nama'),
                    'merek' => $request->get('merek'),
                    'harga' => $request->get('harga'),
                    'jumlah' => $request->get('jumlah')
                    ]);
                    Alert::success('Berhasil', 'Data sparepart terupdate');
                    return redirect()->route('data.admin');
            }
            elseif ($request->file('gambar')||$request->get('deskripsi')) {
                # code...
                if ($request->file('gambar') != null) {
                    # code...
                    $file = $request->file('gambar');
                    $filename = date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('image'), $filename);
                    $sp::where('id', $request->get('update'))->update([
                    'gambar' => $filename,
                    'nama' => $request->get('nama'),
                    'merek' => $request->get('merek'),
                    'harga' => $request->get('harga'),
                    'jumlah' => $request->get('jumlah')
                    ]);
                    Alert::success('Berhasil', 'Data sparepart terupdate');
                    return redirect()->route('data.admin');
                }
                elseif ($request->get('deskripsi')!=null) {
                    # code...
                    $sp::where('id', $request->get('update'))->update([
                    'deskripsi' => $request->get('deskripsi'),
                    'nama' => $request->get('nama'),
                    'merek' => $request->get('merek'),
                    'harga' => $request->get('harga'),
                    'jumlah' => $request->get('jumlah')
                    ]);
                    Alert::success('Berhasil', 'Data sparepart terupdate');
                    return redirect()->route('data.admin');
                }
            }
            elseif ($request->file('gambar')==null && $request->get('deskripsi')==null) {
                # code...
                $sp::where('id', $request->get('update'))->update([
                'nama' => $request->get('nama'),
                'merek' => $request->get('merek'),
                'harga' => $request->get('harga'),
                'jumlah' => $request->get('jumlah')
                ]);
                Alert::success('Berhasil', 'Data sparepart terupdate');
                return redirect()->route('data.admin');
            }
        }
        elseif ($request->get('delete')) {
            # code...
            $sp::where('id', $request->get('delete'))->delete();
            Alert::error('Berhasil', 'Data sparepart terhapus');
            return redirect()->route('data.admin');
        }
    }
    public function regTek(Request $request){
            # code...
            // dd($request->get('daftarkan'));
            $tk = new Teknisi;
            $tk->name = $request->get('name');
            $tk->email = $request->get('email');
            $tk->password = Hash::make($request->get('password'));
            $tk->save();
            Alert::success('Berhasil', 'Akun Teknisi atas nama '.$request->get('name').' berhasil dibuat');
            return redirect()->route('register.admin');
    }
    public function history(){
        $itm = DB::table('orders')
        ->select( 'orders.id', 'spareparts.nama', 'spareparts.merek', 'orders.created_at', 'orders.status',
         'users.name')
         ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
         ->join('users', 'users.id', '=', 'orders.user_id')
         ->whereIn('orders.status', ['cancel', 'complete']);
         $sv = DB::table('services')
         ->select( 'services.id', 'services.code', 'services.type', 'services.created_at', 'services.status',
          'users.name as user')
          ->join('users', 'users.id', '=', 'services.user_id')
          ->whereIn('status', ['complete', 'cancel']);
          $all = $itm->union($sv)->get();
          $t = [];
          for ($i=0; $i <count($all) ; $i++) { 
            # code...
            $a = date('Y', strtotime($all[$i]->created_at));
            array_push($t, $a);
          }
          $t = array_unique($t);
        return view('admin.history', compact('all', 't'));
    }
    public function filter(Request $request){
        if ($request->get('sparepart')) {
            # code...
            if($request->get('tahun')&&$request->get('bulan')){
                return $this->export1($request->get('tahun'), $request->get('bulan'));
        }
            else{
             Alert::error('Gagal!!', 'Lengapi Kolom Filter Sebelum Export');
            }
            return redirect()->route('history.admin');
        }elseif ($request->get('service')) {
            # code...
            if($request->get('tahun')&&$request->get('bulan')){
                return $this->export2($request->get('tahun'), $request->get('bulan'));
        }
            else{
             Alert::error('Gagal!!', 'Lengapi Kolom Filter Sebelum Export');
            }
            return redirect()->route('history.admin');
        }
        elseif ($request->get('filter')) {
            # code...
            if($request->get('tahun')&&$request->get('bulan')){
            $itm = DB::table('orders')
            ->select( 'orders.id', 'spareparts.nama', 'spareparts.merek', 'orders.created_at', 'orders.status',
            'users.name')
            ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->whereIn('orders.status', ['cancel', 'complete'])
            ->whereYear('orders.created_at', $request->get('tahun'))
            ->whereMonth('orders.created_at', $request->get('bulan'));
            $sv = DB::table('services')
            ->select( 'services.id', 'services.code', 'services.type', 'services.created_at', 'services.status',
            'users.name as user')
            ->join('users', 'users.id', '=', 'services.user_id')
            ->whereYear('services.created_at', $request->get('tahun'))
            ->whereMonth('services.created_at', $request->get('bulan'));
            $all = $itm->union($sv)->get();
            $t = [];
            for ($i=0; $i <count($all) ; $i++) { 
                # code...
                $a = date('Y', strtotime($all[$i]->created_at));
                array_push($t, $a);
            }
            $t = array_unique($t);
            return view('admin.history', compact('all', 't'));
            }else{
                return redirect()->route('history.admin');
            }

        }
    }
    public function export1($x, $y){
        return (new SparepartExport($x, $y))->download('Laporan_sparepart.xlsx');
    }
    public function export2($x, $y){
        return (new ServiceExport($x, $y))->download('Laporan_service.xlsx');
    }
    public function orderan(){
        // $y = DB::table('validasis')->select('order_id')->where('id', 3)->get();
        $x = DB::table('validasis')->select('validasis.id', 'users.name', 'users.alamat', 
        'validasis.order_id', 'validasis.total', 'validasis.bukti')
        ->join('users', 'users.id', '=', 'validasis.user_id')
        ->whereNull('validasis.service_id')
        ->get();
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
                    "status" => "cancel"
                ]);
            DB::table('validasis')->where('id', $request->get('dc'))->delete();
            } return redirect()->route('confirm.admin');
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
            }return redirect()->route('confirm.admin');
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
         ->whereIn('orders.status', ['confirm', 'cancel', 'complete', 'send'])
         ->get();
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
