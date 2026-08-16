@extends('admin.layout')

@section('title','Edit FAQ')

@section('content')

<h3 class="mb-4">

Edit FAQ

</h3>

<div class="card">

<div class="card-body">

<form
action="{{ route('faq.update',$faq->id) }}"
method="POST">

@csrf

@method('PUT')

@include('admin.faq._form')

</form>

</div>

</div>

@endsection