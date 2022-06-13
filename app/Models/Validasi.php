<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    protected $fillable =[
        'bukti', 'order_id', 'total'
    ];
}
