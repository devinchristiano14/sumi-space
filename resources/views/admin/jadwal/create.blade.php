@extends('admin.layout')

@section('title','Tambah Jadwal')

@section('content')

<h3 class="mb-4">

Tambah Jadwal

</h3>

<form action="{{ route('jadwal.store') }}" method="POST">

@csrf

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Jam</label>

<input
type="time"
name="jam"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="Tersedia">Tersedia</option>

<option value="Dibooking">Dibooking</option>

</select>

</div>

<button class="btn btn-sumi">

Simpan

</button>

<a href="{{ route('jadwal.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</form>

@endsection