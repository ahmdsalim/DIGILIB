@extends('layouts.applanding')
@section('content')
@if(auth()->user()->role == 'siswa')
<div class="content__header content__boxed rounded-0">
  <div class="content__wrap">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Profile</a></li>
    </ol>
  </div>
                <div class="content__wrap d-md-flex align-items-start">
                    <figure class="m-0">
                        <div class="d-inline-flex align-items-center position-relative pt-xl-3">
                            <div class="flex-shrink-0">   
                                <img class="img-xl rounded-circle" src="{{asset('assets/img/profile-photos/1.png')}}" alt="Profile Picture" loading="lazy">
                            </div>
                            <div class="flex-grow-1 ms-4">
                              <h1 class="mb-4">Profile</h1>
                                <h3 class="text-muted m-0">{{auth()->user()->role}}</h3>
                                <p class="text-muted m-0">{{auth()->user()->email}}</p>
</div>
</div>
</figure>
</div>
</div>

<div class="content__boxed content__profile">
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
                <div class="col-6">
                  <label class="mb-1">Asal Sekolah</label>
                  <div class="fw-bold text-dark">{{auth()->user()->userable->sekolah->nama}}</div>
                </div>                
            </div>
            </div>
          </div>          
        </div>
       </div>
    </div>

@elseif(auth()->user()->role == 'guru')
<div class="content__header content__boxed rounded-0">
  <div class="content__wrap">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </div>
                <div class="content__wrap d-md-flex align-items-start">
                    <figure class="m-0">
                        <div class="d-inline-flex align-items-center position-relative pt-xl-5">
                            <div class="flex-shrink-0">   
                                <img class="img-xl rounded-circle" src="{{asset('assets/img/profile-photos/1.png')}}" alt="Profile Picture" loading="lazy">
                            </div>
                            <div class="flex-grow-1 ms-4">
                              <h1 class="mb-4">Profile</h1>
                                <a href="#" class="h3 btn-link">{{auth()->user()->role}}</a>
                                <p class="text-muted m-0">{{auth()->user()->email}}</p>
</div>
</div>
</figure>
</div>
</div>

<div class="content__boxed content__profile">
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