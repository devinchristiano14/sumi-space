@extends('admin.layout')

@section('title','Edit Price List')

@section('content')

<h3 class="mb-4">

Edit Price List

</h3>

<div class="card">

<div class="card-body">

<form
action="{{ route('pricelist.update',$priceList->id) }}"
method="POST">

@csrf

@method('PUT')

@include('admin.pricelist._form')

</form>

</div>

</div>

@endsection