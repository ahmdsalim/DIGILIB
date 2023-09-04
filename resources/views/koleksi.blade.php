@extends('layouts.applanding')

@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Koleksi</a></li>
    </ol>
@endsection

@section('pagetitle')
    <h2 class="page-title mb-0 mt-2">Koleksi Anda</h2>
    <p class="lead mb-0">Jangan Lupa Untuk Membaca Bukunya Yaaa..
    </p>
@endsection

@section('content')
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row">
                       @foreach ($koleksi as $data)                          
						<div>
                            <h1>Tanggal {{$data->created_at}}</h1>
                        </div>
         <div class="col-6 col-sm-6 col-md-4 col-lg-2">
              <a href="/detailbuku/{{$data->buku->id}}/{{$data->buku->slug}}" style="text-decoration: none;">
                <div class="card mb-3">
                  <img class="card-img-top" alt="Card image cap" src="{{asset('img/thumbnail-buku/'.$data->buku->thumbnail)}}">
                    <div class="card-body">
                      <h5 class="card-title">{{$data->buku->judul}}</h5>
                      <h6 class="text-secondary">Pengarang : {{$data->buku->penulis}}</h6>
                      <h6 class="text-secondary">Penerbit : {{$data->buku->penerbit}}</h6>
                      <div class="d-flex justify-content-between">
                        <h6 class="text-secondary">Rating</h6>
                        <a href="" class="" type="submit">+</a>
                      </div>
                    </div>
                </div>
              </a>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
