<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-4">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>${{ $product->price }}</p>
        </div>
    </div>
</div>
@endsection
