<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\BookingController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PriceListController;

/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/booking', [BookingController::class, 'create'])->name('booking');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('paket', PaketController::class);

    Route::resource('jadwal', JadwalController::class)->except(['create','store']);

    Route::delete('jadwal/hapus/lama',[JadwalController::class,'hapusJadwalLama'])->name('jadwal.hapus.lama');

    Route::resource('booking', AdminBookingController::class)
        ->except(['create', 'store']);

    Route::put('booking/{booking}/konfirmasi',[AdminBookingController::class, 'konfirmasi'])->name('booking.konfirmasi');

    Route::resource('galeri', GaleriController::class);

    Route::resource('faq', FaqController::class);

    Route::resource('pricelist', PriceListController::class);

});