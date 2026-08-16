<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketFoto extends Model
{
    protected $table = 'paket_fotos';

    protected $fillable = [

        'nama_paket',

        'jenis_layanan',

        'harga',

        'deskripsi',

        'status',

        'booking_online'

    ];
}