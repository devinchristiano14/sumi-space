@extends('admin.layout')

@section('title','Edit Booking')

@section('content')

<h3>Edit Status Booking</h3>

<form action="{{ route('booking.update',$booking->id) }}" method="POST">

@csrf

@method('PUT')

<div class="card shadow border-0">

<div class="card-body">

<div class="mb-3">

<label>Status Booking</label>

<select
name="status_booking"
class="form-select">

<option value="Menunggu"
{{ $booking->status_booking=='Menunggu'?'selected':'' }}>

Menunggu

</option>

<option value="Dikonfirmasi"
{{ $booking->status_booking=='Dikonfirmasi'?'selected':'' }}>

Dikonfirmasi

</option>

<option value="Selesai"
{{ $booking->status_booking=='Selesai'?'selected':'' }}>

Selesai

</option>

<option value="Dibatalkan"
{{ $booking->status_booking=='Dibatalkan'?'selected':'' }}>

Dibatalkan

</option>

</select>

</div>

<button class="btn btn-sumi">

Update

</button>

<a href="{{ route('booking.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</form>

@endsection