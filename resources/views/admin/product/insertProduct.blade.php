@push('styles')
<link rel="stylesheet" href="{{ asset('css/dy.id/insertProduct.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card mb-4">
        <div class="d-flex flex-row">
            <div class="card-body d-flex flex-column justify-content-center">
                <form method="POST" action="{{route('admin.products.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name"class="col-md-4 col-form-label text-md-right">Product Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right" >Description</label>
                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    


                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right" >Price</label>
                        <div class="col-md-6">
                            <div>
                                <p class="text-warning ">*all prices are in Rupiah (Rp)</p>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"  min="1" name="price" required autocomplete="price" autofocus>
                            </div>

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right" >Categories</label>
                        <div class="col-md-6">
                            <select class="form-control" name="category" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach  
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="picture" class="col-md-4 col-form-label text-md-right">Picture</label>
                        <div class="col-md-6">
                            <input id="picture" type="file" class="@error('picture') is-invalid @enderror" name="picture" autocomplete="picture" autofocus/>
                            @error('picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="mt-3">Current Product Picture</h4>

                    <div class="form-group row mb-0">
                        <div >
                            <button type="Submit" class="btn btn-primary">💾 Add</button>
                            <a href="{{route('admin.products' ) }}" class="btn btn-dark">❌ Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


