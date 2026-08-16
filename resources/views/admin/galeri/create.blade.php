@extends('admin.layout')

@section('title','Tambah Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Tambah Galeri</h3>

    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">

        Kembali

    </a>

</div>

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="card shadow-sm">

    <div class="card-body">

        <form
            action="{{ route('galeri.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include('admin.galeri._form')

        </form>

    </div>

</div>

@endsection