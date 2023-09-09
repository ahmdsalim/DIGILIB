@extends('layouts.applanding')

@section('content') 
<div class="content__header content__boxed rounded-0">
  <div class="content__wrap">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Terakhir Dibaca</a></li>
    </ol>
  </div>
                <div class="content__wrap d-md-flex align-items-start justify-content-center mb-5">
                        <div class="d-inline-flex align-items-center position-relative pt-xl-1">
                            <div class="flex-grow-1 text-center">
                              <div class="display-3 mb-3">Terakhir Dibaca</div>
    <p class="lead">
      Berikut adalah tampilan list buku yang sudah selesai anda baca dan belum selesai dibaca
    </p>
</div>
</div> 
</div>
</div>

<div class="content__boxed">
  <div class="row justify-content-center">
    <div class="col-12 col-md-9">
      <div class="content__wrap">

    <div class="content__boxed">
      <div class="content__wrap">
        <div class="row">

        <div class="d-flex justify-content-between mb-2">
          <h1>Lanjut Membaca</h1>
          <div></div>    
        </div>

        @forelse ($lanjutbaca as $data)
           <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <a href="{{route('buku.detailbuku',['id'=>$data->buku->id, 'slug'=>$data->buku->slug])}}" style="text-decoration: none;">
                  <div class="card mb-3">
                    <img class="card-img-top" alt="{{$data->buku->judul}}" src="{{asset('img/thumbnail-buku/'.$data->buku->thumbnail)}}">
                      <div class="card-body">
                        <h4 class="card-title">{{$data->buku->judul}} ({{$data->buku->tahun_terbit}})</h4>
                      </div>
                  </div>
                </a>
          </div>
        @empty
        <div class="content__boxed">
        <div class="alert alert-primary fw-bold text-center" role="alert">
         Anda Belum Memiliki Data Buku Pada Sesi Ini, <a href="/" style="text-decoration: none;" class="pe-auto">Ayo Membaca...</a>
        </div></div>
        @endforelse        

<div class="mb-3"></div>

        <div class="d-flex justify-content-between mb-2">
          <h1>Selesai Dibaca</h1>
          <div></div>    
        </div>

        @forelse ($selesaibaca as $data)                          
           <div class="col-4 col-sm-3 col-md-3 col-lg-2">
          <a href="{{route('buku.detailbuku',['id'=>$data->buku->id, 'slug'=>$data->buku->slug])}}" style="text-decoration: none;">
            <div class="card mb-3">
              <img class="card-img-top" alt="{{$data->buku->judul}}" src="{{asset('img/thumbnail-buku/'.$data->buku->thumbnail)}}">
                <div class="card-body">
                  <h4 class="card-title">{{$data->buku->judul}} ({{$data->buku->tahun_terbit}})</h4>
                </div>
            </div>
          </a>
        </div>
        @empty
        <div class="content__boxed">
        <div class="alert alert-primary fw-bold text-center" role="alert">
         Anda Belum Memiliki Data Buku Pada Sesi Ini, <a href="/" style="text-decoration: none;" class="pe-auto">Ayo Membaca...</a>
        </div></div>
        @endforelse        
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

@endsection

@push('css')
<style>
        .card {
        /*height: 270px;
        width: 140px;*/
        background: none;
        box-shadow: none;
        text-align: center;
        }

        .card-img-top:hover {
            transform: scale(1.05); /* Efek zoom ketika hover */
        }

        .card-title {
            font-weight: bold;
            font-size: 10px;
        }

        .card-img-top {
            height: 148px;
            width: 100px;
            object-fit: cover;
            transition: transform 0.2s;
            box-shadow: 0 1rem 1rem -0.75rem rgba(105,96,215,.175);
        }

        @media only screen and (min-width: 600px) {
          /* For tablets: */
          .card-img-top {
            height: 160px;
            width: 122px;
            box-shadow: 0 1rem 1rem -0.75rem rgba(105,96,215,.175);
          }
          .card-title {
              font-weight: bold;
              font-size: 11px;
          }
          .card {
            /*height: 270px;
            width: 140px;*/
            background: none;
            box-shadow: none;
            text-align: center;
            }
        }

        @media only screen and (min-width: 768px) {
          /* For desktop: */
          .card-img-top {
            height: 210px;
            width: 140px;
            box-shadow: 0 1rem 1rem -0.75rem rgba(105,96,215,.175);
          }
          .card-title {
              font-weight: bold;
              font-size: 13px;
          } 
          .card {
          /*height: 270px;
          width: 140px;*/
          background: none;
          box-shadow: none;
          text-align: center;
          }
        }
        .display-3 {
          color: #fff;
          font-family: Ubuntu;
        }
</style>
@endpush