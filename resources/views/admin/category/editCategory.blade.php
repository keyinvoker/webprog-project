@push('styles')
<link rel="stylesheet" href="{{ asset('css/dy.id/editProduct.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card mb-4">
        <div class="d-flex flex-row">
            <div class="card-body d-flex flex-column justify-content-center">
                <form method="POST" action="{{url('admin/categories/update/'.Crypt::encrypt($category->id))}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name"class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name}}" autocomplete="name" autofocus/>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div >
                            <button type="Submit" class="btn btn-primary">💾 Save</button>
                            <a href="{{route('admin.categories')}}" class="btn btn-dark">❌ Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


