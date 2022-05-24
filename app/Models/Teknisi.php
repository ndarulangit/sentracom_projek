<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teknisi extends Authenticatable
{
    use Notifiable;

    protected $table = 'teknisis';

    protected $fillable = ['name', 'email',  'password'];

    protected $hidden = ['password',  'remember_token'];


}