@extends('admin.layout')

@section('title','Tambah Price List')

@section('content')

<h3 class="mb-4">

Tambah Price List

</h3>

<div class="card">

<div class="card-body">

<form
action="{{ route('pricelist.store') }}"
method="POST">

@csrf

@include('admin.pricelist._form')

</form>

</div>

</div>

@endsection