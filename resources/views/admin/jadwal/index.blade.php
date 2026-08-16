@extends('admin.layout')

@section('title','Jadwal')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h3>Jadwal Studio</h3>

    <div>

        <form
            action="{{ route('jadwal.hapus.lama') }}"
            method="POST"
            class="d-inline">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Hapus semua jadwal yang sudah lewat?')"
                class="btn btn-danger">

                Hapus Jadwal Lama

            </button>

        </form>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Tanggal</th>

                    <th>Jam</th>

                    <th>Status</th>

                    <th width="170">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($jadwals as $jadwal)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ date('d M Y', strtotime($jadwal->tanggal)) }}</td>

                    <td>{{ date('H:i', strtotime($jadwal->jam)) }}</td>

                    <td>

                        @if($jadwal->status == 'Tersedia')

                            <span class="badge bg-success">

                                Tersedia

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Dibooking

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('jadwal.edit',$jadwal->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('jadwal.destroy',$jadwal->id) }}"
                            method="POST"
                            class="d-inline">

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

                    <td colspan="5" class="text-center">

                        Belum ada jadwal.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection