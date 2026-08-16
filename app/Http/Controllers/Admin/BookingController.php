<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with([
            'paket',
            'jadwal'
        ])->latest()->get();

        return view(
            'admin.booking.index',
            compact('bookings')
        );
    }

    public function edit(Booking $booking)
    {
        return view(
            'admin.booking.edit',
            compact('booking')
        );
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status_booking' => 'required'
        ]);

        $booking->update([
            'status_booking' => $request->status_booking
        ]);

        return redirect()
            ->route('booking.index')
            ->with(
                'success',
                'Status booking berhasil diperbarui.'
            );
    }

    public function konfirmasi($id)
    {
        $booking = Booking::with('jadwal')->findOrFail($id);

        $booking->update([
            'status_booking' => 'Dikonfirmasi'
        ]);

        $pesan =
"📸 *SUMI SPACE SELF PHOTO STUDIO BATAM*

Halo {$booking->nama_pelanggan},

Booking kamu telah *DIKONFIRMASI* ✅

━━━━━━━━━━━━━━

📅 Tanggal :
{$booking->jadwal->tanggal}

🕒 Jam :
{$booking->jadwal->jam}

👥 Jumlah Orang :
{$booking->jumlah_orang}

📍 Mohon hadir 15 menit sebelum jadwal dimulai.

Terima kasih telah melakukan booking di
*Sumi Space Self Photo Studio Batam* 🙏";

        WhatsAppService::send(
            $booking->no_whatsapp,
            $pesan
        );

        return redirect()
            ->route('booking.index')
            ->with(
                'success',
                'Booking berhasil dikonfirmasi.'
            );
    }

    public function show($id)
    {
        $booking = Booking::with([
            'paketFoto',
            'jadwal'
        ])->findOrFail($id);

        return view(
            'admin.booking.show',
            compact('booking')
        );
    }
}