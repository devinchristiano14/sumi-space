@extends('admin.layout')

@section('title','Edit Paket')

@section('content')

<h3 class="mb-4">
    Edit Paket Foto
</h3>

<form action="{{ route('paket.update',$paket->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="mb-3">

                <label class="form-label">
                    Nama Paket
                </label>

                <input
                    type="text"
                    name="nama_paket"
                    value="{{ $paket->nama_paket }}"
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
                    value="{{ $paket->jenis_layanan }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    value="{{ $paket->harga }}"
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
                    required>{{ $paket->deskripsi }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select">

                    <option
                        value="Aktif"
                        {{ $paket->status == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option
                        value="Nonaktif"
                        {{ $paket->status == 'Nonaktif' ? 'selected' : '' }}>
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

                    <option
                        value="1"
                        {{ $paket->booking_online ? 'selected' : '' }}>
                        Booking Online
                    </option>

                    <option
                        value="0"
                        {{ !$paket->booking_online ? 'selected' : '' }}>
                        Walk-in Only
                    </option>

                </select>

                <small class="text-muted">
                    Pilih "Walk-in Only" jika paket hanya tersedia di lokasi studio.
                </small>

            </div>

            <button class="btn btn-sumi">
                Update
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