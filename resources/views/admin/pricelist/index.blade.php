@extends('admin.layout')

@section('title','Price List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

<h3>Price List</h3>

<a
href="{{ route('pricelist.create') }}"
class="btn btn-sumi">

+ Tambah

</a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card">

<div class="card-body">

<table class="table table-hover">

<thead>

<tr>

<th>No</th>
<th>Layanan</th>
<th>Harga</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($priceLists as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama_layanan }}</td>

<td>Rp {{ number_format($item->harga,0,',','.') }}</td>

<td>

<span class="badge bg-success">

{{ $item->status }}

</span>

</td>

<td>

<a
href="{{ route('pricelist.edit',$item->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('pricelist.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center">

Belum ada data.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection