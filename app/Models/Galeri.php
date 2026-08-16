<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'paket_foto_id',
        'judul',
        'gambar',
    ];

    public function paket()
    {
        return $this->belongsTo(PaketFoto::class,'paket_foto_id');
    }
}