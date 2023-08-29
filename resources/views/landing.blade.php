@extends('layouts.applanding')

@section('content')
               <div class="content__boxed">
                   <div class="content__wrap">
                       <div class="row">
                               <div class="card">
                                   <div class="card-header d-flex align-items-center border-0">
                                       <div class="me-auto">
                                           <h3 class="h4 m-0"></h3>
                                       </div>
                                       <div class="toolbar-end">
                                           <button type="button" class="btn btn-icon btn-sm btn-hover btn-light" aria-label="Refresh Network Chart">
                                               <i class="demo-pli-repeat-2 fs-5"></i>
                                           </button>
                                       </div>
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
         <div class="col-sm-6 col-lg-3">
              <a href="{{route('buku.detailbuku',['id'=>$data->id, 'slug'=>$data->slug])}}" style="text-decoration: none;">
                <div class="card mb-4">
                  <img class="card-img-top" alt="Card image cap" src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}">
                    <div class="card-body">
                      <h3 class="card-title">{{$data->judul}}</h3>
                      <h6 class="card-text">Pengarang : {{$data->penulis}}</h6>
                      <h6 class="card-text">Penerbit : {{$data->penerbit}}</h6>
                      <div class="d-flex justify-content-between">
                        <h6 class="card-text">Rating</h6>
                        <a href="" type="submit">+</a>
                      </div>
                    </div>
                </div>
              </a>
        </div>
        @endforeach
        <div class="col-sm-6 col-lg-3"> <a href="/detailbuku" style="text-decoration: none;">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/cover2.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div></a>
        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/cover3.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/cover4.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
      </div>
        <div class="d-flex justify-content-between mb-2">
                            <h1>Buku Terpopuler</h1>
                            <a href="/">Lihat Semua</a>
                        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
                      <a href="" type="submit">+</a>
                </div>
                </div>
            </div>
        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                  <div class="card-body">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <h6 class="card-text">Pengarang </h6>
                    <h6 class="card-text">Penerbit</h6>
                    <div class="d-flex justify-content-between">
                    <h6 class="card-text">Rating</h6>
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
        height: 300px;
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
</style>
@endpush
