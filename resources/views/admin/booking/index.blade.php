@extends('admin.layout')

@section('title','Booking')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Data Booking</h3>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>WhatsApp</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                    <th width="220">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($bookings as $booking)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $booking->nama_pelanggan }}</td>

                    <td>{{ $booking->no_whatsapp }}</td>

                    <td>{{ $booking->jadwal->tanggal }}</td>

                    <td>{{ substr($booking->jadwal->jam,0,5) }}</td>

                    <td>

                        @if($booking->status_booking=='Menunggu')

                            <span class="badge bg-warning text-dark">

                                Menunggu

                            </span>

                        @elseif($booking->status_booking=='Dikonfirmasi')

                            <span class="badge bg-success">

                                Dikonfirmasi

                            </span>

                        @elseif($booking->status_booking=='Selesai')

                            <span class="badge bg-primary">

                                Selesai

                            </span>

                        @elseif($booking->status_booking=='Dibatalkan')

                            <span class="badge bg-danger">

                                Dibatalkan

                            </span>

                        @endif

                    </td>

                    <td>

                        @if($booking->status_booking=='Menunggu')

                        <form
                            action="{{ route('booking.konfirmasi',$booking->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('PUT')

                            <button class="btn btn-success btn-sm">

                                Konfirmasi

                            </button>

                        </form>

                        @endif
                        <a
                        href="{{ route('booking.show',$booking->id) }}"
                        class="btn btn-info btn-sm">

                        Detail

                        </a>
                        
                        <a
                            href="{{ route('booking.edit',$booking->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        Belum ada data booking.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection