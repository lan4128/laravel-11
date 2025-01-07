<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kustomer extends Model
{
    //
    use HasFactory;
    //
    protected $fillable = [
        'nik',
        'name',
        'telp',
        'email',
        'alamat',
    ];
}
