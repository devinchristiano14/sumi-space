@extends('admin.layout')

@section('title','Paket Foto')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Paket Foto</h3>

    <a href="{{ route('paket.create') }}" class="btn btn-sumi">

        + Tambah Paket

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama Paket</th>

                    <th>Jenis Layanan</th>

                    <th>Harga</th>

                    <th>Status</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($pakets as $paket)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $paket->nama_paket }}</td>

                    <td>{{ $paket->jenis_layanan }}</td>

                    <td>Rp {{ number_format($paket->harga,0,',','.') }}</td>

                    <td>

                        <span class="badge bg-success">

                            {{ $paket->status }}

                        </span>

                    </td>

                    <td>

                        <a href="{{ route('paket.edit',$paket->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('paket.destroy',$paket->id) }}" method="POST" class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data paket.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection