@extends('layouts.app')
@push('css')
<style type="text/css">
    a {
        text-decoration: none;
    }

    h4 {
        font-family: Poppins;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="my-auto">Masuk</h4>
                        <a href="{{route('register')}}">Daftar</a>
                    </div>
                    @if(Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}}" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('password.request') }}">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
