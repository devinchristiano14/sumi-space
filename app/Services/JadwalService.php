<?php

namespace App\Services;

use App\Models\Jadwal;
use Carbon\Carbon;

class JadwalService
{
    public static function generate()
    {
        // Hapus jadwal yang sudah lewat
        Jadwal::whereDate('tanggal', '<', today())->delete();

        // Jam operasional Sumi Space
        $jamOperasional = [
            '09:00',
            '09:40',
            '10:20',
            '11:00',
            '11:40',
            '12:20',
            '13:00',
            '13:40',
            '14:20',
            '15:00',
            '15:40',
            '16:20',
            '17:00',
            '17:40',
            '18:20',
            '19:00',
            '19:40',
            '20:20',
            '21:00',
        ];

        // Membuat jadwal untuk 30 hari ke depan (termasuk hari ini)
        for ($i = 0; $i < 30; $i++) {

            $tanggal = Carbon::today()
                ->addDays($i)
                ->toDateString();

            // Jika jadwal tanggal ini sudah ada, lewati
            if (Jadwal::whereDate('tanggal', $tanggal)->exists()) {
                continue;
            }

            foreach ($jamOperasional as $jam) {

                Jadwal::create([
                    'tanggal' => $tanggal,
                    'jam'      => $jam,
                    'status'   => 'Tersedia',
                ]);

            }
        }
    }
}