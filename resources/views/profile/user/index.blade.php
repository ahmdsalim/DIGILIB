@extends('layouts.applanding')
@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
@endsection
@section('pagetitle')
    <h2 class="page-title mb-0 mt-2">Profile {{auth()->user()->nama}}</h2>
    <p class="lead mb-0">
        {{auth()->user()->role}}
    </p>
    <p class="small">{{auth()->user()->email}}</p>
@endsection

@section('content')
@if(auth()->user()->role == 'siswa')
<div class="content__boxed content__profile" onload="disableRoundedHeader()">
       <div class="content__wrap">
        <div class="card p-4">
          <div class="row">
            <div class="col-12 col-md-8">
              <div class="row g-3">
                <h5 class="mb-1">Informasi Siswa</h5>
                <div class="col-6">
                  <label class="mb-1">Nama Siswa</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->nama}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">NISN</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->nisn}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">NPSN</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->npsn}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">No Telepon</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->telepon}}</div>
                </div>
            </div>
            </div>
          </div>          
        </div>
       </div>
    </div>
<script>
                                   function disableRoundedHeader() {
                                    document.querySelector("#content > .content__profile").classList.toggle("rounded-0");
                                }
                                    </script>
@elseif(auth()->user()->role == 'guru')
<div class="content__boxed">
       <div class="content__wrap">
        <div class="card p-4">
          <div class="row">
            <div class="col-12 col-md-8">
              <div class="row g-3">
                <h5 class="mb-1">Informasi Guru</h5>
                <div class="col-6">
                  <label class="mb-1">Nama Guru</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->nama}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">NIP</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->nip}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">NPSN</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->npsn}}</div>
                </div>
                <div class="col-6">
                  <label class="mb-1">No Telepon</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->telepon}}</div>
                </div>
            </div>
            </div>
          </div>          
        </div>
       </div>
    </div>
@endif
@endsection