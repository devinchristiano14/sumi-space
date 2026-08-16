<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $fillable = [
        'nama_layanan',
        'harga',
        'deskripsi',
        'status'
        
    ];
}