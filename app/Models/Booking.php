<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [

        'paket_foto_id',

        'jadwal_id',

        'nama_pelanggan',

        'email',

        'no_whatsapp',

        'jumlah_orang',

        'bawa_pet',

        'status_booking'

    ];

    public function paket()
    {
        return $this->belongsTo(PaketFoto::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}