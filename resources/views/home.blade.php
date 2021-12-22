@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dy.id/home.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container w-75 mt-3">
    @if (count($products) > 0)
        <div class="d-flex justify-content-center">
            <h2 class="text-primary fw-bolder"><i>New Product !</i></h2>
        </div>
    @else
    @endif
    <div class="container d-flex flex-column justify-content-center " id="mainWrapper">
        <div class="container d-flex flex-wrap justify-content-center">
            <div class="d-flex flex-row flex-wrap justify-content-start" id="cardContainer">
                @forelse ($products as $product)
                <div class="card mt-4">
                    <img class="card-img-top" src="{{asset('storage/products/'.$product->picture)}}" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{$product->name}}</h3>
                        <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
                        <p class="card-text">Category: {{$product->category_name}}</p>
                        <a href="{{route('products.detail',['q'=>Crypt::encrypt($product->id)])}}" class="btn btn-warning">Learn More</a>
                    </div>
                </div>
                @empty
                <div id="emptyProducts" class="mt-3 carousel slide p-5 text-light d-flex flex-column justify-content-center" data-bs-ride="carousel">
                    <h3>{{Auth::user()->name}}: Wheres my r̶e̶n̶t products?</h3>
                    <h3>Bully: {{$randomMessage}}</h3>
                </div>
                @endforelse
            </div>
    </div>
    </div>    
    <div class="container" style="margin-top: 2rem">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection
