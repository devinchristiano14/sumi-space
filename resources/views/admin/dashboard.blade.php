@extends('admin.layout')

@section('title','Dashboard')

@section('content')

<h2 class="mb-4 fw-bold">

    Dashboard Admin

</h2>

<div class="row g-4 mb-4">

    <div class="col-lg-3 col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">

                    Total Booking

                </h6>

                <h2 class="fw-bold text-danger">

                    {{ $totalBooking }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">

                    Jadwal

                </h6>

                <h2 class="fw-bold text-primary">

                    {{ $totalJadwal }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">

                    Paket Foto

                </h6>

                <h2 class="fw-bold text-success">

                    {{ $totalPaket }}

                </h2>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <h6 class="text-muted">

                    Galeri

                </h6>

                <h2 class="fw-bold text-warning">

                    {{ $totalGaleri }}

                </h2>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            Booking Terbaru

        </h5>

    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama</th>

                    <th>Tanggal</th>

                    <th>Jam</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($bookingTerbaru as $booking)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $booking->nama_pelanggan }}</td>

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

                        @else

                            <span class="badge bg-danger">

                                Dibatalkan

                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada data booking.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection