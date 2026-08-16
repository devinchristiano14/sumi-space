<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Galeri;
use App\Models\Jadwal;
use App\Models\PaketFoto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooking = Booking::count();

        $totalJadwal = Jadwal::count();

        $totalPaket = PaketFoto::count();

        $totalGaleri = Galeri::count();

        $bookingTerbaru = Booking::with('jadwal')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBooking',
            'totalJadwal',
            'totalPaket',
            'totalGaleri',
            'bookingTerbaru'
        ));
    }
}