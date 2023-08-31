<!-- resources/views/books/search.blade.php -->
@extends('layouts.applanding')
@push('css')
<style type="text/css">
    .img-thumbnail {
        padding: 5px 0 0;
        background: 0 0;
        border: 0;
        border-radius: 0;
        line-height: 1.42857143;
        display: inline-block;
        max-width: 100%;
        height: auto;
    }
    .desc {
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>
@endpush
@section('content')
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="card">
                                <div class="card-body p-xl-4">

                                    <!-- Result information -->
                                    <div class="pb-2 mb-4 border-bottom">
                                        <h3 class="mb-2">
                                            <span class="text-nowrap">Hasil Pencarian: </span>
                                            <span class="text-normal">{{$keyword}}</span>
                                        </h3>
                                    </div>
                                                @foreach ($results as $data)
                                                <div class="row pb-2 mb-4 border-bottom">
                                                    <div class="col-3 col-md-2">
                                                        <figure class="m-0">
                                                            <a href="" title="" rel="bookmark">
                                                                <img src="{{asset('img/thumbnail-buku/'.$data->thumbnail)}}" alt="" class="img-thumbnail">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="col-9 col-md-10" style="padding: 0 7px;">
                                                        <h3 class="p-0 m-0">{{$data->judul}}</h3>
                                                        <p class="my-1" style="font-size: 14px;">
                                                            {{$data->penulis.' · '.$data->tahun_terbit}}
                                                        </p>
                                                        <div class="mb-2">
                                                            <span class="fw-bold text-dark">4.3</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="mb-1" height="12" width="12" version="1.1" id="Capa_1" viewBox="0 0 47.94 47.94" xml:space="preserve">
                                                            <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                            </svg>
                                                        </div>
                                                        <p class="desc">{{Str::limit("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                        tempor.", 250, "...")}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
