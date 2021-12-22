@push('styles')
<link rel="stylesheet" href="{{ asset('css/dy.id/productView.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container mt-4 ">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ( $products as $product )
            <tr>
            <th scope="row">
                {{$loop->iteration}}
            </th>
            <td>
                <img class="card-img-top" src="{{asset('storage/products/'.$product->picture)}}" alt="">
            </td>
            <td>
                {{$product->name}}
            </td>
            <td id="productViewDescription">
                {{$product->description}}
            </td>
            <td>
                Rp {{number_format( $product->price , 0 , '.' , ',' );}},-
            </td>
            <td>
                {{$product->category_name}}
            </td>
            <td>
                <div class="d-flex flex-row">
                    <a href="{{route('admin.products.getUpdatePage', ["q" => Crypt::encrypt($product->id)])}}" class="btn btn-warning mx-1">⚙ Edit Item</a>
                    <form method="POST" action="{{url('admin/products/delete/'.Crypt::encrypt($product->id))}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">🧺 Delete Item</button>
                    </form> 
                </div>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <h3>No Available Product(s) 🗿</h3>
                </td>
                
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection


