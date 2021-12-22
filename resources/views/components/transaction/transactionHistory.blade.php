@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dy.id/transactionHistory.css') }}">
@endpush

@extends('layouts.app')

@section('content')

<div class="container w-50 mt-3 ">
    <div class="d-flex justify-content-center">
        <h4 class="text-light fw-bolder">Transaction History of {{Auth::user()->name}}</h4>
    </div>
        @forelse ($transactions as $transaction)
            @if($showSumCartPriceStatus[$transaction->cart_detail_id] ==true)
                <div class="card p-3 mb-5 bg-white" >
            @else
                <div class="card p-3">
            @endif
            <div class="d-flex flex-row text-start align-items-center">
                <div>
                    <img class="card-img-top" src="{{asset('storage/products/'.$transaction->product_picture)}}" alt="Card image cap">
                </div>
                <div class="card-body mx-5">
                    <div class="d-flex flex-row justify-content-evenly mb-3">
                        <h3 class="card-title">{{$transaction->name}}</h3>
                        <p class="card-text"><small>@ Rp {{number_format( $transaction->price , 0 , '.' , ',' );}},-</small></p>
                    </div>
                <p class="card-text">X {{$transaction->quantity}} piece(s)</p>
                <p class="card-text" id="productDesc">Rp {{number_format( $transaction->totalPrice , 0 , '.' , ',' );}},-</p>

                </div>
            </div>
            @if($showSumCartPriceStatus[$transaction->cart_detail_id] == true)
                <div class="d-flex flex-row justify-content-evenly mt-3">
                    <div>
                        <p><b>Total Price: Rp {{number_format($sumCartPrice[$transaction->cart_id] , 0 , '.' , ',' );}},-</b></p>
                    </div>
                    
                    <div>
                        <p>{{date('d-m-Y H:i:s', strtotime($transaction->created_at.' +7 hour'))}}</p>
                    </div>
                    
                </div>
            @else
            
            @endif

        </div>
        @empty
        <div class="card bg-dark text-white " id="emptyCart">
            <div class="card-img-overlay d-flex flex-column justify-content-center text-start">
                <h3>{{Auth::user()->name}}: Wheres my r̶e̶n̶t transaction history?</h3>
                <h3>Bully: {{$randomMessage}}</h3>
            </div>
        </div>   
        @endforelse
</div>

@endsection


