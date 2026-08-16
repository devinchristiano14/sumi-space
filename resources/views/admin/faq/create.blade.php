@extends('admin.layout')

@section('title','Tambah FAQ')

@section('content')

<h3 class="mb-4">

Tambah FAQ

</h3>

<div class="card">

<div class="card-body">

<form
action="{{ route('faq.store') }}"
method="POST">

@csrf

@include('admin.faq._form')

</form>

</div>

</div>

@endsection