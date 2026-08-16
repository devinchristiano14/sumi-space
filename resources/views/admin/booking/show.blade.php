@extends('admin.layout')

@section('title','Detail Booking')

@section('content')

<h3 class="mb-4">
    Detail Booking
</h3>

<div class="card">

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="250">Nama Pelanggan</th>
                <td>{{ $booking->nama_pelanggan }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $booking->email }}</td>
            </tr>

            <tr>
                <th>WhatsApp</th>
                <td>{{ $booking->no_whatsapp }}</td>
            </tr>

            <tr>
                <th>Paket</th>
                <td>{{ $booking->paketFoto->nama_paket }}</td>
            </tr>

            <tr>
                <th>Tanggal</th>
                <td>{{ $booking->jadwal->tanggal }}</td>
            </tr>

            <tr>
                <th>Jam</th>
                <td>{{ $booking->jadwal->jam }}</td>
            </tr>

            <tr>
                <th>Jumlah Orang</th>
                <td>{{ $booking->jumlah_orang }}</td>
            </tr>

            <tr>
                <th>Membawa Pet</th>
                <td>{{ $booking->bawa_pet }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>

                    <span class="badge bg-primary">

                        {{ $booking->status_booking }}

                    </span>

                </td>
            </tr>

        </table>

        <a
            href="{{ route('booking.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

@endsection