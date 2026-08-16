@extends('admin.layout')

@section('title','Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Galeri Foto</h3>

    <a href="{{ route('galeri.create') }}" class="btn btn-sumi">

        + Tambah Foto

    </a>

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

                    <th width="60">No</th>

                    <th width="120">Preview</th>

                    <th>Judul</th>

                    <th>Paket</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($galeris as $galeri)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        <img
                            src="{{ asset('uploads/galeri/'.$galeri->gambar) }}"
                            width="90"
                            class="rounded shadow">

                    </td>

                    <td>

                        {{ $galeri->judul }}

                    </td>

                    <td>

                        {{ $galeri->paket->nama_paket ?? '-' }}

                    </td>

                    <td>

                        <a
                            href="{{ route('galeri.edit',$galeri->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('galeri.destroy',$galeri->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin ingin menghapus foto ini?')"
                                class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada foto galeri.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection