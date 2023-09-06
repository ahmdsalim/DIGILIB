@extends('layouts.applanding')

@section('content') 
<div class="content__header content__boxed rounded-0">
  <div class="content__wrap">
        <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Buku Terbaru</a></li>
    </ol>
  </div>
                <div class="content__wrap d-md-flex align-items-start">
                        <div class="d-inline-flex align-items-center position-relative pt-xl-5">
                            <div class="flex-grow-1 ">
                              <h1 class="mb-3">Buku Terbaru</h1>
    <p class="lead">
      Berikut adalah tampilan list buku yang diurutkan berdasarkan tanggal terbaru
    </p>
</div>
</div>
</div>
</div>

<div class="content__boxed">
       <div class="content__wrap">
          <div class="row">
    <div class="col-12 col-md-9">
        @foreach ($buku as $data)                          
         <div class="col-6 col-sm-6 col-md-3">
              <a href="{{route('buku.detailbuku',['id'=>$data->id, 'slug'=>$data->slug])}}" style="text-decoration: none;">
                <div class="card mb-3">
                  <img class="card-img-top" alt="Card image cap" src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}">
                    <div class="card-body">
                      <h4 class="card-title">{{$data->judul}} ({{$data->tahun_terbit}})</h4>
                    </div>
                </div>
              </a>
        </div>
        @endforeach
          </div>
          </div>          
        </div>
       </div>
@endsection

@push('css')
<style>
        .card-img-top {
        height: 330px;
        width: 200px;
        object-fit: cover;
        transition: transform 0.2s;

        }
        .card {
        height: 350px;
        width: 200px;
        background: none;
        box-shadow: none;
        text-align: center;
        }

        .card-img-top:hover {
            transform: scale(1.05); /* Efek zoom ketika hover */
        }
        .card-title {
            font-weight: bold;
            font-size: 15px;
        }
</style>
@endpush