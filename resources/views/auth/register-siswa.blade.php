@extends('layouts.app')
@push('css')
<style type="text/css">
    a {
        text-decoration: none;
    }

    h4 {
        font-family: Poppins;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="card-body">
                    <h4 class="mb-3">Mendaftar sebagai Siswa</h4>
                    @if(Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}}" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{route('register.siswa.store')}}">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label">NISN</label>
                            <input  type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required placeholder="Masukkan NISN" autofocus>

                            @error('nisn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Sekolah</label>
                            <select  class="form-select @error('sekolah') is-invalid @enderror" name="sekolah" required="">
                               <option value="">Pilih Sekolah</option>
                               @foreach($sekolahs as $sekolah)
                               <option value="{{$sekolah->npsn}}">{{$sekolah->nama}}</option>
                               @endforeach
                            </select>
                            @error('sekolah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                      
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Kata Sandi</label>
                            <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan kata sandi">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Masukkan ulang kata sandi">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-select').select2({
            width: '100%'
        });
    });
</script>
@endpush