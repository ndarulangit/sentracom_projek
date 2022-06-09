<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'spareparts';
    
    protected $fillable = [
        'nama',
        'merek',
        'harga',
        'jumlah'
    ];
}
