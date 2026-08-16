@extends('admin.layout')

@section('title','Tambah Paket')

@section('content')

<h3 class="mb-4">
    Tambah Paket Foto
</h3>

<form action="{{ route('paket.store') }}" method="POST">
@csrf

<div class="card shadow border-0">

<div class="card-body">

<div class="mb-3">

<label class="form-label">
Nama Paket
</label>

<input
type="text"
name="nama_paket"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Jenis Layanan
</label>

<input
type="text"
name="jenis_layanan"
class="form-control"
placeholder="Contoh : Self Photo Studio"
required>

</div>

<div class="mb-3">

<label class="form-label">
Harga
</label>

<input
type="number"
name="harga"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Deskripsi
</label>

<textarea
name="deskripsi"
class="form-control"
rows="4"
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Status
</label>

<select
name="status"
class="form-select">

<option value="Aktif">
Aktif
</option>

<option value="Nonaktif">
Nonaktif
</option>

</select>

</div>

<div class="mb-4">

<label class="form-label">
Jenis Pemesanan
</label>

<select
name="booking_online"
class="form-select">

<option value="1">

Booking Online

</option>

<option value="0">

Walk-in Only

</option>

</select>

<small class="text-muted">

Pilih "Walk-in Only" jika paket tidak dapat dipesan melalui website.

</small>

</div>

<button class="btn btn-sumi">

Simpan

</button>

<a
href="{{ route('paket.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</form>

@endsection