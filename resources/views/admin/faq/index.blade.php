@extends('admin.layout')

@section('title','FAQ')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Data FAQ</h3>

    <a href="{{ route('faq.create') }}" class="btn btn-sumi">

        + Tambah FAQ

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

<div class="card-body">

<table class="table table-bordered align-middle">

<thead>

<tr>

<th width="5%">No</th>

<th width="35%">Pertanyaan</th>

<th>Jawaban</th>

<th width="10%">Status</th>

<th width="15%">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($faqs as $faq)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $faq->pertanyaan }}</td>

<td>{{ Str::limit($faq->jawaban,80) }}</td>

<td>

@if($faq->status=="Aktif")

<span class="badge bg-success">

Aktif

</span>

@else

<span class="badge bg-secondary">

Nonaktif

</span>

@endif

</td>

<td>

<a
href="{{ route('faq.edit',$faq->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('faq.destroy',$faq->id) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus FAQ?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center">

Belum ada FAQ.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection