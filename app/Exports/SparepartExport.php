<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class SparepartExport implements FromCollection
{
    use Exportable;

    public function __construct(int $year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        $itm = DB::table('orders')
        ->select( 'orders.id', 'spareparts.nama', 'spareparts.merek', 'orders.created_at', 'orders.status',
         'users.name', 'users.email')
         ->join('spareparts', 'spareparts.id','=','orders.sparepart_id')
         ->join('users', 'users.id', '=', 'orders.user_id')
         ->whereIn('orders.status', ['cancel', 'complete'])
         ->whereYear('orders.created_at', '=', $this->year)
         ->whereMonth('orders.created_at', $this->month)
         ->get();
        return $itm;
    }
}
