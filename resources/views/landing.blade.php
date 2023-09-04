@extends('layouts.applanding')

@section('content')
<div class="content__boxed">
  <div class="row justify-content-center">
    <div class="col-12 col-md-9">
      <div class="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
                        <div class="card-body" style="height: 300px;">
                            <div class="d-flex flex-column">
      <img src="" class="d-block w-100 img" alt="...">
    </div>
</div>
</div>
</div>
</div>
<div class="content__boxed">
  <div class="content__wrap">
  <div class="row">
    <div class="d-flex justify-content-between mb-2">
      <h1>Buku Terbaru</h1>
        <a href="{{route('bukuterbaru')}}">Lihat Semua</a>
    </div>
        @foreach ($bukuterbaru as $data)                          
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

        <div class="d-flex justify-content-between mb-2">
                            <h1>Buku Terpopuler</h1>
                            <a href="{{route('bukuterpopuler')}}">Lihat Semua</a>
                        </div>
        @foreach ($bukuterpopuler as $data)                          
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
</div></div></div>
@endsection

@push('css')
<style>
        .card-img-top {
        height: 330px;
        width: 200px;
        object-fit: cover;
        transition: transform 0.2s;

        }
        .carousel-item {
        height: 300px;
        width: 100%;
        object-fit: cover;
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
        .carousel {
        height: 300px;
        width: 100%;
        object-fit: cover;
        }
        .container {
          padding: 10px;
          border-block: 10px;
          border-color: white;
        }
        .item-overlay {
    display: inline-block;
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    background: #000;
    overflow: hidden;
}
.featured-item {
    margin-bottom: 10px;
    position: relative;
    text-align: center;
}
.quality-SD {
    background: rgba(68,126,187,.8);
}
.quality-top {
    top: 0;
    right: 0;
    padding: 3px 5px;
    position: absolute;
    color: #fff;
    font-size: 80%;
    font-weight: 600;
}
.rating {
    left: 0;
    top: 0;
    background: rgba(0,0,0,.6);
    position: absolute;
    padding: 3px 5px;
    color: #fff;
    font-size: 80%;
    font-weight: 600;
}
.item-overlay .item-action {
    position: absolute;
    left: 50%;
    top: 39%;
}
  .img {
        height: 300px;
        width: 100%;
        object-fit: cover;

      }
  .carousel-inner {
        height: 300px;
        width: 100%;
        object-fit: cover;
  }
</style>
@endpush