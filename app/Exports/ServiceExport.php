<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServiceExport implements FromCollection
{
    use Exportable;

    public function __construct(int $year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        $sv = DB::table('services')
         ->select( 'services.id', 'services.code', 'services.type', 'services.created_at', 'services.status',
          'users.name as user')
          ->join('users', 'users.id', '=', 'services.user_id')
          ->whereIn('status', ['complete', 'cancel'])
          ->whereYear('services.created_at', '=', $this->year)
          ->whereMonth('services.created_at', $this->month)
          ->get();
        return $sv;
    }
}
