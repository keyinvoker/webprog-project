@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dy.id/cartDetail.css') }}">
@endpush

@extends('layouts.app')

@section('content')
{{-- for member --}}
<div class="container w-50 mt-3 ">
    <div class="d-flex flex-column justify-content-center ">
    @if ($nullStatus == true)
    <div class="card bg-dark text-white " id="emptyCart">
        <div class="card-img-overlay d-flex flex-column justify-content-center text-start">
            <h3>{{Auth::user()->name}}: Wheres my r̶e̶n̶t cart?</h3>
            <h3>Bully: {{$randomMessage}}</h3>
        </div>
    </div> 
    @else
        @forelse ($cartDetails as $cartDetail)
        <div class="card mb-1 p-3">
            <div class="d-flex flex-row text-start align-items-center">
                <div>
                    <img class="card-img-top" src="{{asset('storage/products/'.$cartDetail->picture)}}" alt="Card image cap">
                </div>
                <div class="card-body mx-5">
                    <div class="d-flex flex-row justify-content-evenly mb-3">
                        <h3 class="card-title">{{$cartDetail->name}}</h3>
                        <p class="card-text"><small>@ Rp {{number_format( $cartDetail->price , 0 , '.' , ',' );}},-</small></p>
                    </div>
                <p class="card-text">X {{$cartDetail->quantity}} piece(s)</p>
                <p class="card-text" id="productDesc">Rp {{number_format( $cartDetail->totalPrice , 0 , '.' , ',' );}},-</p>
                <div class="d-flex flex-row justify-content-evenly">
                    <a href="{{route('cart.getEdit', ['q' => Crypt::encrypt($cartDetail->id)])}}" class="btn btn-warning mx-1">⚙ Edit Item</a>
                    <form method="POST" action="{{url('cart/remove/'.Crypt::encrypt($cartDetail->id))}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">🧺 Delete Item</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @empty
        <div class="card bg-dark text-white " id="emptyCart">
            <div class="card-img-overlay d-flex flex-column justify-content-center text-start">
                <h3>{{Auth::user()->name}}: Wheres my r̶e̶n̶t cart?</h3>
                <h3>Bully: {{$randomMessage}}</h3>
            </div>
        </div>   
        @endforelse
    @endif

    @if ($nullStatus == false)
    <div class="card bg-dark bg-gradient text-light" >
        <div class="card-body">
            <div class="text-start">
                <h3 class="card-title border-bottom">Wanna checkout?</h3>
                <h5 class="card-text">Total checkout price: </h5>
                <p class="card-text"><small>Rp {{number_format( $sumTotal , 0 , '.' , ',' );}},-</small></p>
            </div>
            <form method="POST" action="{{url('cart/checkout/'.Crypt::encrypt($cartDetail->cart_id))}}">
                @csrf
                <button type="submit" class="btn btn-success mt-4">👉 Confirm</button>
            </form>
        </div>
      </div>
    @endif
    </div>
</div>

@endsection


