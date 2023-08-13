@extends('layouts.applanding')

@section('content')
<style type="text/css">
        .card-img-top {
        height: 300px;
        object-fit: cover;
    }
        .carousel-item {
        width: 100%;
        }
</style>

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
            </div>
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row">
                        <div class="d-flex justify-content-between mb-2">
                            <h1>Buku Terbaru</h1>
                            <a href="/lihatsemuabukuterbaru">Lihat Semua</a>
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
</div></div>
@endsection