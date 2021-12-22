@push('styles')
<link rel="stylesheet" href="{{ asset('css/dy.id/categoryView.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container mt-4 ">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ( $categories as $category )
            <tr>
            <th scope="row">
                {{$loop->iteration}}
            </th>
            <td>
                {{$category->name}}
            </td>
            <td>
                <div class="d-flex flex-row">
                    <a href="{{route('admin.categories.getUpdatePage',["q" => Crypt::encrypt($category->id)])}}" class="btn btn-warning mx-1">⚙ Update Category</a>
                    <form method="POST" action="{{url('admin/categories/delete/'.Crypt::encrypt($category->id))}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">🧺 Delete Category</button>
                    </form> 
                </div>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h3>No Available Categories 🗿</h3>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection


