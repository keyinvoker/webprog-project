@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dy.id/home.css') }}">
@endpush

@extends('layouts.app')

@section('content')
{{-- check if auth user exist --}}
@if(Auth::user())
<div class="d-flex justify-content-center mt-5">
    <div id="unauthorized401" class="mt-3 carousel slide p-5 text-light d-flex flex-column justify-content-center" data-bs-ride="carousel">
        <h3>{{Auth::user()->name}}: Give me some of that web action!</h3>
        <h3>Bully: <b><i>See ya chump</i></b> *crashes the web</h3>
        <h3>{{Auth::user()->name}}: What the hell man!</h3>
    </div>
</div>
@endif
@endsection
