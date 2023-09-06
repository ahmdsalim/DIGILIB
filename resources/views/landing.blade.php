@extends('layouts.applanding')

@section('content')
<div class="content__header content__boxed mb-4">
  <div class="content__wrap">
    <div class="pt-3 mb-4 text-center">
      <div class="display-1" style="font-family: Ubuntu,sans-serif;">DIGILIB</div>
        <h3 class="mb-4">
          <div class="badge text-light" style="font-family: Ubuntu,sans-serif;">Digital Library</div>
        </h3>
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

          <div class="d-flex justify-content-between mb-4">
            <h1 class="text-dark">Buku Terbaru</h1>
              <a href="{{route('bukuterbaru')}}">Lihat Semua</a>
          </div>
          
          @foreach ($bukuterbaru as $data)                          
           <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <a href="{{route('buku.detailbuku',['id'=>$data->id, 'slug'=>$data->slug])}}" style="text-decoration: none;">
                  <div class="card mb-3">
                    <img class="card-img-top" alt="{{$data->judul}}" src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}">
                      <div class="card-body">
                        <h4 class="card-title">{{$data->judul}} ({{$data->tahun_terbit}})</h4>
                      </div>
                  </div>
                </a>
          </div>
          @endforeach
          <div class="mb-3"></div>

          <div class="d-flex justify-content-between mb-4">
                              <h1 class="text-dark">Buku Terpopuler</h1>
                              <a href="{{route('bukuterpopuler')}}">Lihat Semua</a>
                          </div>
          @foreach ($bukuterpopuler as $data)                          
           <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                <a href="{{route('buku.detailbuku',['id'=>$data->id, 'slug'=>$data->slug])}}" style="text-decoration: none;">
                  <div class="card mb-3">
                    <img class="card-img-top" alt="{{$data->judul}}" src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}">
                      <div class="card-body px-1 py-3">
                        <h6 class="card-title">{{$data->judul}} ({{$data->tahun_terbit}})</h6>
                      </div>
                  </div>
                </a>
          </div>
          @endforeach

        </div>
      </div>
    </div>
     </div>
</div></div></div>
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
            height: 200px;
            width: 133px;
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

        .display-1 {
          color: #fff;
          font-family: Ubuntu;
        }
      </style>
@endpush