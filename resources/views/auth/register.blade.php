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
        <div class="col-md-6">
            <div class="card p-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="my-auto">Daftar</h4>
                        <a href="{{route('login')}}">Masuk</a>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <a href="{{route('register.sekolah')}}" class="btn btn-outline-primary fs-6 w-100 rounded-pill">
                                Mendaftar sebagai Sekolah
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('register.siswa')}}" class="btn btn-outline-primary fs-6 w-100 rounded-pill">
                                Mendaftar sebagai Siswa
                            </a>
                        </div>
                        <div class="col-md-12">
                            <a href="{{route('register.guru')}}" class="btn btn-outline-primary fs-6 w-100 rounded-pill">
                                Mendaftar sebagai Guru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
