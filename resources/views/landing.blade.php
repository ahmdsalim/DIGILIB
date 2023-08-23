@extends('layouts.applanding')

@section('content')
               <div class="content__boxed">
                   <div class="content__wrap">
                       <div class="row">
                               <div class="card-carousel">
                                       <div class="me-auto">
                                           <h3 class="h4 m-0"></h3>
                                       </div>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
        <div class="card-body py-0" style="height: 250px; max-height: 275px">
      <img src="assets/img/Cover.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <div class="card-body py-0" style="height: 250px; max-height: 275px">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
      </div>
    <div class="carousel-item">
      <div class="card-body py-0" style="height: 250px; max-height: 275px">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
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
                            <a href="/buku/terbaru">Lihat Semua</a>
                        </div>
        @foreach ($buku as $data)                          
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <a href="/detailbuku/{{$data->id}}/{{$data->slug}}" style="text-decoration: none;">
                <div class="card mb-3">
                  <img class="card-img-top" alt="Card image cap" src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}">
                    <div class="card-body">
                      <h5 class="card-title">{{$data->judul}}</h5>
                      <h6 class="text-secondary">Pengarang : {{$data->penulis}}</h6>
                      <h6 class="text-secondary">Penerbit : {{$data->penerbit}}</h6>
                      <div class="d-flex justify-content-between">
                        <h6 class="text-secondary">Rating</h6>
                        <a href="" type="submit">+</a>
                      </div>
                    </div>
                </div>
              </a>
        </div>
        @endforeach

        <div class="d-flex justify-content-between mb-2">
                            <h1>Buku Terpopuler</h1>
                            <a href="/">Lihat Semua</a>
                        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <div class="card mb-3">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h5 class="card-title">Proposal Penawaran</h5>
                    <h6 class="text-secondary">Pengarang </h6>
                    <h6 class="text-secondary">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="text-secondary">Rating</h6>
                      <a href="" type="submit">+</a>
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
        .card-img-top {
        height: 250px;
        object-fit: cover;
        }
        .carousel-item {
        width: 100%;
        }
        .card {
            transition: transform 0.2s; /* Efek transisi untuk zoom */
        }

        .card:hover {
            transform: scale(1.05); /* Efek zoom ketika hover */
        }
        .card-title {
            font-weight: bold;
        }
        .carousel {
          flex: 1; /* Memberikan rasio fleksibilitas yang sama pada setiap kartu */
          min-width: 100px; /* Set ukuran minimum untuk setiap kartu */
          background-color: #f0f0f0;
          padding: 10px;
          margin: 10px;
          border-radius: 10px;        }
</style>
@endpush
