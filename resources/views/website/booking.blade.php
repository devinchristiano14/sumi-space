@extends('layouts.website')

@section('title','Booking')

@section('content')

<section class="py-5">

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0 rounded-4">

<div class="card-body p-5">

<h2 class="fw-bold text-center mb-4">

Booking Studio

</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif

@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('booking.store') }}" method="POST">

@csrf

<div class="mb-4">

<label class="form-label fw-semibold">

Paket

</label>

<input
type="text"
class="form-control"
value="{{ $paket->nama_paket }}"
readonly>

<input
type="hidden"
name="paket_foto_id"
value="{{ $paket->id }}">

</div>

<hr class="mb-4">

<h5 class="fw-bold mb-3">

Pilih Tanggal

</h5>

<div
id="tanggal-container"
class="d-flex flex-wrap gap-3 mb-4">

@foreach($tanggalTersedia as $tanggal => $jam)

<button
type="button"
class="btn btn-outline-danger tanggal-btn"
data-tanggal="{{ $tanggal }}">

<div class="fw-bold">

{{ \Carbon\Carbon::parse($tanggal)->format('d') }}

</div>

<div>

{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('M') }}

</div>

</button>

@endforeach

</div>

<hr class="mb-4">

<h5 class="fw-bold mb-3">

Pilih Jam

</h5>

<div
id="jam-container"
class="d-flex flex-wrap gap-2 mb-4">

<span class="text-muted">

Silakan pilih tanggal terlebih dahulu.

</span>

</div>

<input
type="hidden"
name="jadwal_id"
id="jadwal_id"
required>

<hr class="mb-4">

<div class="mb-3">

<label class="form-label">

Nama

</label>

<input
type="text"
name="nama_pelanggan"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Nomor WhatsApp

</label>

<input
type="text"
name="no_whatsapp"
class="form-control"
placeholder="62xxxxxxxxxx"
required>

</div>

<div class="row">

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

Jumlah Orang

</label>

<input
type="number"
name="jumlah_orang"
class="form-control"
min="1"
max="12"
required>

</div>

</div>

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

Membawa Pet?

</label>

<select
name="bawa_pet"
class="form-select">

<option value="0">

Tidak

</option>

<option value="1">

Ya

</option>

</select>

</div>

</div>

</div>

<button
type="submit"
class="btn btn-sumi w-100 mt-3">

Booking Sekarang

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</section>

<script>

const jadwals = @json($jadwals);

const tanggalButtons = document.querySelectorAll(".tanggal-btn");
const jamContainer = document.getElementById("jam-container");
const inputJadwal = document.getElementById("jadwal_id");

tanggalButtons.forEach((btn)=>{

    btn.addEventListener("click",function(){

        document.querySelectorAll(".tanggal-btn").forEach((b)=>{

            b.classList.remove("btn-danger");
            b.classList.add("btn-outline-danger");

        });

        btn.classList.remove("btn-outline-danger");
        btn.classList.add("btn-danger");

        jamContainer.innerHTML = "";

        inputJadwal.value = "";

        const tanggal = btn.dataset.tanggal;

        const hasil = jadwals.filter(item => item.tanggal === tanggal);

        if(hasil.length === 0){

            jamContainer.innerHTML = `
                <div class="alert alert-warning w-100 mb-0">
                    Tidak ada jadwal tersedia.
                </div>
            `;

            return;
        }

        hasil.forEach((item)=>{

            const tombol = document.createElement("button");

            tombol.type = "button";

            tombol.className = "btn btn-outline-primary jam-btn";

            tombol.innerHTML = item.jam.substring(0,5);

            tombol.onclick = function(){

                document.querySelectorAll(".jam-btn").forEach((b)=>{

                    b.classList.remove("btn-primary");

                    b.classList.add("btn-outline-primary");

                });

                tombol.classList.remove("btn-outline-primary");

                tombol.classList.add("btn-primary");

                inputJadwal.value = item.id;

            };

            jamContainer.appendChild(tombol);

        });

    });

});

</script>

<style>

.tanggal-btn{

    width:90px;

    height:90px;

    border-radius:18px;

    transition:.25s;

    font-weight:600;

}

.tanggal-btn:hover{

    transform:translateY(-4px);

}

.jam-btn{

    min-width:90px;

    border-radius:12px;

    margin-bottom:10px;

}

#jam-container{

    min-height:60px;

}

</style>

@endsection