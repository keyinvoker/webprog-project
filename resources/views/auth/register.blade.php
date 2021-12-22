@push('styles')
<link rel="stylesheet" href="{{ asset('css/dy.id/content.css') }}">
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-container mt-5 mb-5">
            <div class="card w-75 p-5">
                <div class="card-header">Join With Us</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Input Your Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="d-flex flex-row justify-content-evenly  w-50">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                                    <label class="form-check-label" for="genderMale">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" required>
                                    <label class="form-check-label" for="genderFemale">
                                      Female
                                    </label>
                                  </div>
                                @if (Session::has('message'))
                                  <p class="text-danger mt-2">{{ Session::get('message') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Input Your Address" style="height: 5rem">
                                
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Input Your Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Input Your Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype Your Password">
                            </div>
                        </div>

                        <input class="form-check-input" name="terms&conditions" type="checkbox" required>
                        <label class="form-check-label" for="terms&conditions">
                          I agree to the terms & conditions</a>
                        </label>


                        <div class="row mt-3">
                            <div class="d-flex justify-content-end w-100">
                                <button type="submit" class="btn btn-primary w-25">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
