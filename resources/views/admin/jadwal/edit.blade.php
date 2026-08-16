@extends('admin.layout')

@section('title','Edit Jadwal')

@section('content')

<h3 class="mb-4">

Edit Jadwal

</h3>

<form action="{{ route('jadwal.update',$jadwal->id) }}" method="POST">

@csrf

@method('PUT')

<div class="card shadow-sm border-0">

<div class="card-body">

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
value="{{ $jadwal->tanggal }}"
class="form-control">

</div>

<div class="mb-3">

<label>Jam</label>

<input
type="time"
name="jam"
value="{{ substr($jadwal->jam,0,5) }}"
class="form-control">

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="Tersedia"
{{ $jadwal->status=='Tersedia'?'selected':'' }}>

Tersedia

</option>

<option value="Dibooking"
{{ $jadwal->status=='Dibooking'?'selected':'' }}>

Dibooking

</option>

</select>

</div>

<button class="btn btn-sumi">

Update

</button>

<a href="{{ route('jadwal.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</form>

@endsection