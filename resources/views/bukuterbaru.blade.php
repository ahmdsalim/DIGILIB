@extends('layouts.applanding')

@section('content')
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row">
                        <div class="d-flex mb-2">                      
                          <br>
                            <h1>Buku Terbaru</h1>
                        </div>
         <div class="col-sm-6 col-lg-3">
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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
                <img class="card-img-top" alt="Card image cap" src="{{asset('assets/img/Cover.jpg')}}">
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