@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dy.id/cartDetailEdit.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container w-100 mt-5">
    <div class="card d-flex flex-row">
        <div class=" d-flex justify-content-center">
          <img class="card-img-top" src="{{asset('storage/products/'.$product->picture)}}" alt="Card image cap">
        </div>
        <div class="card-body d-flex flex-column justify-content-center">
          <h3 class="card-title border-bottom border-danger">{{$product->name}}</h3>
          <p class="card-text">{{$product->category_name}}</p>
          <p class="card-text">Price: Rp{{number_format( $product->price , 0 , '.' , ',' );}},-</p>
          <p class="card-text" id="productDesc">{{$product->description}}</p>
          <div class="d-flex justify-content-center">
              <form class="forms-sample w-75" method="POST" action="{{url('cart/edit/'.Crypt::encrypt($cartDetail->id))}}">
                  @csrf
                  <div class="form-group d-flex flex-row justify-content-evenly">
                      <div class="text-success mt-1">Choose Quantity</div>
                      <input id="quantity" type="number" class="w-50 form-control @error('quantity') is-invalid @enderror"  min="1" name="quantity" required autocomplete="quantity" autofocus>
                      @if (Session::has('message'))
                          <p class="text-danger mt-2">{{ Session::get('message') }}</p>
                      @endif
                  </div>
                <div class="mt-4 d-flex justify-content-center">
                    <div class="d-flex justify-content-center flex-column">
                        <button type="submit" class="btn btn-grad-success mb-2">Save</button>
                        <a href="{{route('cart.detail', ['q'=>Crypt::encrypt(Auth::user()->id)])}}" class="btn btn-grad-danger">Cancel</a>
                    </div>
                </div>   
              </form>
          </div>
        </div>
      </div>    
</div>
@endsection
