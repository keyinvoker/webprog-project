@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/product-style.css') }}">

<center>
    <h2>New Products</h2>
</center>

<div class="product-grid">

    @forelse ($product as $x)
    <div class="cardProduct">
        <div class="cardProduct-img">
            <img src="{{ Storage::url($x->image) }}" alt="No image" />
        </div>
        <div class="cardProduct-txt">
            <h2>{{ $x->name }}</h2>
            <p>{{ $x->description }}</p>
        </div>
        <div class="cardProduct-desc">
            <div class="desc">
                <div class="price"><b>Price</b></div>
                <div class="value">Rp. {{ $x->price }}</div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert-warning">No product.</div>
    @endforelse

</div>

@endsection