<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\PaketFoto;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use App\Services\JadwalService;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create()
    {
        JadwalService::generate();

        $paket = PaketFoto::where('status', 'Aktif')->first();

        // Batas booking = 1 jam dari sekarang
        $batasBooking = Carbon::now()->addHour();

        $jadwals = Jadwal::where('status', 'Tersedia')
            ->where(function ($query) use ($batasBooking) {

                // Semua tanggal setelah hari ini
                $query->whereDate('tanggal', '>', $batasBooking->toDateString())

                    // Hari ini hanya tampilkan slot minimal 1 jam dari sekarang
                    ->orWhere(function ($q) use ($batasBooking) {

                        $q->whereDate('tanggal', $batasBooking->toDateString())
                            ->where('jam', '>=', $batasBooking->format('H:i'));

                    });

            })
            ->orderBy('tanggal')
            ->orderBy('jam')
            ->get();

        $tanggalTersedia = $jadwals->groupBy('tanggal');

        return view(
            'website.booking',
            compact(
                'paket',
                'jadwals',
                'tanggalTersedia'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_foto_id' => 'required',
            'jadwal_id' => 'required',
            'nama_pelanggan' => 'required|max:100',
            'email' => 'required|email',
            'no_whatsapp' => 'required|max:20',
            'jumlah_orang' => 'required|integer|min:1|max:12',
            'bawa_pet' => 'required'
        ]);

        $jadwal = Jadwal::findOrFail($request->jadwal_id);

        // Sudah dibooking orang lain
        if ($jadwal->status == 'Dibooking') {

            return back()->with(
                'error',
                'Maaf, jadwal tersebut sudah dibooking.'
            );

        }

        // Batas booking maksimal 1 jam sebelum sesi
        $waktuBooking = Carbon::parse($jadwal->tanggal . ' ' . $jadwal->jam);

        $batasBooking = Carbon::now()->addHour();

        if ($waktuBooking->lessThan($batasBooking)) {

            return back()->with(
                'error',
                'Maaf, booking hanya dapat dilakukan maksimal 1 jam sebelum jadwal sesi.'
            );

        }

        $booking = Booking::create([

            'paket_foto_id' => $request->paket_foto_id,

            'jadwal_id' => $request->jadwal_id,

            'nama_pelanggan' => $request->nama_pelanggan,

            'email' => $request->email,

            'no_whatsapp' => $request->no_whatsapp,

            'jumlah_orang' => $request->jumlah_orang,

            'bawa_pet' => $request->bawa_pet,

            'status_booking' => 'Menunggu'

        ]);

        $jadwal->update([

            'status' => 'Dibooking'

        ]);

        $pesan =
"📸 *SUMI SPACE SELF PHOTO STUDIO BATAM*

Halo {$booking->nama_pelanggan},

Booking kamu telah berhasil dibuat.

━━━━━━━━━━━━━━

📅 Tanggal :
{$jadwal->tanggal}

🕒 Jam :
{$jadwal->jam}

👥 Jumlah Orang :
{$booking->jumlah_orang}

📌 Status :
Menunggu Konfirmasi

━━━━━━━━━━━━━━

Mohon menunggu konfirmasi dari admin.

Terima kasih telah melakukan booking di Sumi Space 🙏";

        WhatsAppService::send(
            $booking->no_whatsapp,
            $pesan
        );

        return redirect()
            ->route('booking')
            ->with(
                'success',
                'Booking berhasil dikirim.'
            );
    }
}