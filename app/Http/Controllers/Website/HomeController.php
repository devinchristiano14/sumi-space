<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PaketFoto;
use App\Models\PriceList;
use App\Models\Galeri;
use App\Models\Faq;
use App\Services\JadwalService;

class HomeController extends Controller
{
    public function index()
    {
        // Panggil service di sini
        JadwalService::generate();

        $pakets = PaketFoto::where('status', 'Aktif')->get();

        $priceLists = PriceList::where('status', 'Aktif')->get();

        $galeris = Galeri::latest()->get();

        $faqs = Faq::latest()->get();

        return view('website.home', compact(
            'pakets',
            'priceLists',
            'galeris',
            'faqs'
        ));
    }
}