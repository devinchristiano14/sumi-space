@extends('layouts.website')

@section('title','Home')

@section('content')

{{-- ================= HERO ================= --}}

<section class="hero" id="hero">

<div class="container">

<div class="row align-items-center gy-5">

<div class="col-lg-6">

<span class="badge bg-danger px-3 py-2 mb-3">

BATAM'S SELF PHOTO STUDIO

</span>

<h1 class="display-4 fw-bold">

Capture Your

<span class="text-danger">

Best Moment

</span>

at Sumi Space

</h1>

<p class="mt-4 text-muted">

Abadikan setiap momen spesial bersama pasangan,
keluarga maupun sahabat di Sumi Space.

Nikmati pengalaman Self Photo Studio dengan
kamera profesional, remote shutter, dan studio
yang nyaman di Batam.

</p>

<div class="d-flex gap-3 mt-4">

<a
href="{{ route('booking') }}"class="btn btn-sumi btn-lg">

Booking Sekarang

</a>

<a
href="#paket"class="btn btn-outline-dark btn-lg">

Lihat Paket

</a>

</div>

<div class="row mt-5">

<div class="col-4">

<h3 class="fw-bold text-danger">

2022

</h3>

<p class="small text-muted">

Berdiri Sejak

</p>

</div>

<div class="col-4">

<h3 class="fw-bold text-danger">

1000+

</h3>

<p class="small text-muted">

Happy Customer

</p>

</div>

<div class="col-4">

<h3 class="fw-bold text-danger">

4.9★

</h3>

<p class="small text-muted">

Google Review

</p>

</div>

</div>

</div>

<div class="col-lg-6 text-center">

<img src="{{ asset('assets/images/gedung.jpg') }}"class="img-fluid hero-image"alt="Hero">

</div>

</div>

</div>

</section>

{{-- ================= ABOUT ================= --}}

<section id="about">

    <div class="container">

        <div class="row align-items-center gy-5">

            <div class="col-lg-6">

                <img

                    src="{{ asset('assets/images/studio.jpeg') }}"

                    class="img-fluid rounded-4 shadow"

                    alt="About">

            </div>

            <div class="col-lg-6">

                <h2 class="section-title">

                    Tentang Sumi Space

                </h2>

                <p>

                Sumi Space merupakan Self Photo Studio yang berdiri di Kota Batam sejak tahun 2022. Kami menghadirkan pengalaman berfoto mandiri menggunakan kamera profesional dan remote shutter sehingga pelanggan dapat berpose dengan bebas tanpa fotografer.

                </p>

                <p>

                Selain menyediakan studio reguler yang dapat dibooking secara online, Sumi Space juga memiliki berbagai konsep foto seperti Bedroom Studio, Tennis Court, dan Snap Station yang dapat dinikmati secara walk-in.

                </p>

                <p>

                Kami percaya setiap momen layak diabadikan dengan cara yang menyenangkan, nyaman, dan berkualitas.

                </p>

            </div>

        </div>

    </div>

</section>

{{-- ================= PAKET ================= --}}

<section id="paket" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Paket Foto

            </h2>

            <p class="text-muted">

                Pilih konsep foto yang tersedia di Sumi Space.

            </p>

        </div>

        <div class="row">

            @foreach($pakets as $paket)

        <div class="col-lg-4 mb-4">

        <div class="card h-100">

        <div class="card-body text-center">

            <h4>

                {{ $paket->nama_paket }}

            </h4>

            <h2 class="text-danger">

                Rp {{ number_format($paket->harga,0,',','.') }}

            </h2>

            <p class="fw-semibold">

                {{ $paket->jenis_layanan }}

            </p>

            <p class="text-muted">

                {{ $paket->deskripsi }}

            </p>

            @if($paket->booking_online)

                <a href="{{ route('booking') }}"class="btn btn-sumi">

                    Booking Sekarang

                </a>

            @else

                <span class="badge bg-secondary px-3 py-2">

                    Walk-in Only

                </span>

            @endif

        </div>
    </div>
</div>
@endforeach

</div>

{{-- ================= PRICE LIST ================= --}}

<section id="price" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Price List
            </h2>

            <p class="text-muted">
                Daftar harga tambahan di Sumi Space.
            </p>

        </div>

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card shadow border-0">

                    <div class="card-body p-0">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-danger">

                                <tr>

                                    <th width="35%">
                                        Layanan
                                    </th>

                                    <th width="45%">
                                        Deskripsi
                                    </th>

                                    <th class="text-end">
                                        Harga
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($priceLists as $price)

                                <tr>

                                    <td>

                                        <strong>

                                            {{ $price->nama_layanan }}

                                        </strong>

                                    </td>

                                    <td>

                                        {{ $price->deskripsi }}

                                    </td>

                                    <td class="text-end fw-bold text-danger">

                                        Rp {{ number_format($price->harga,0,',','.') }}

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- ================= GALERI ================= --}}

<section id="gallery" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Galeri</h2>
            <p class="text-muted">
                Beberapa hasil foto dan suasana studio di Sumi Space.
            </p>
        </div>

        <div class="row g-4">
            @foreach($galeris as $galeri)
                <div class="col-lg-3 col-md-4 col-6">
                        <img
                            src="{{ asset('storage/galeri/'.$galeri->gambar) }}"
                            class="gallery-img"
                            alt="{{ $galeri->judul }}">
                
                </div>
            @endforeach
        </div>

    </div>
</section>
{{-- ================= FAQ ================= --}}

<section id="faq">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Frequently Asked Questions

            </h2>

        </div>

        <div class="accordion" id="faqAccordion">

            @foreach($faqs as $faq)

            <div class="accordion-item mb-3">

                <h2 class="accordion-header">

                    <button

                        class="accordion-button collapsed"

                        data-bs-toggle="collapse"

                        data-bs-target="#faq{{ $faq->id }}">

                        {{ $faq->pertanyaan }}

                    </button>

                </h2>

                <div

                    id="faq{{ $faq->id }}"

                    class="accordion-collapse collapse"

                    data-bs-parent="#faqAccordion">

                    <div class="accordion-body">

                        {{ $faq->jawaban }}

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

{{-- ================= CTA ================= --}}

<section class="cta">

    <div class="container text-center">

        <h2>

            Siap Mengabadikan Momen Bersama Kami?

        </h2>

        <p class="mt-3">

            Booking sekarang dan nikmati pengalaman Self Photo Studio terbaik di Batam.

        </p>

        <a href="{{ route('booking') }}" class="btn btn-light btn-lg rounded-pill mt-4">

            Booking Sekarang

        </a>

    </div>

</section>

@endsection