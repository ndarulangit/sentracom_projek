<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id', 'teknisi_id', 'code', 'type', 'booking', 'ket', 'status', 'amount'
    ];}
