@extends('layouts.applanding')

@section('content')
            <div class="content__boxed">
                <div class="content__wrap">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="card-search">
                                <div class="card-body-search p-xl-4">

                                    <!-- Result information -->
                                    <div class="pb-2 mb-4 border-bottom">
                                        <h3 class="mb-2">
                                            <span class="text-nowrap">Hasil Pencarian: </span>
                                            <span class="text-normal">{{$keyword}}</span>
                                        </h3>
                                    </div>
                                                @forelse ($results as $data)
                                                <div class="row pb-2 mb-4 border-bottom">
                                                    <div class="col-3 col-md-2">
                                                        <figure class="m-0">
                                                            @if($data->thumbnail)
                                                                <img src="{{asset('storage/imgs/thumbnail-buku/'.$data->thumbnail)}}" alt="{{ $data->judul }}" class="img-thumbnail" loading="lazy">
                                                            @else
                                                                <img src="{{ Storage::url('imgs/default-pict.png') }}" alt="{{ $data->judul }}" class="img-thumbnail" loading="lazy">
                                                            @endif
                                                        </figure>
                                                    </div>
                                                    <div class="col-9 col-md-10" style="padding: 0 7px;">
                                                        <h3 class="p-0 m-0" style="font-size: 1.3em;"><a class="text-decoration-none text-dark" href="{{route('buku.detailbuku',['id'=>$data->id, 'slug'=>$data->slug])}}">{{$data->judul}}</a></h3>
                                                        <p class="my-1" style="font-size: 1em;">
                                                            {{$data->penulis.' · '.$data->tahun_terbit}}
                                                        </p>
                                                        <div class="mb-2">
                                                            <span class="fw-bold text-dark">{{ round($data->getRating(),1) }}</span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="mb-1" height="12" width="12" version="1.1" id="Capa_1" viewBox="0 0 47.94 47.94" xml:space="preserve">
                                                            <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757  c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042  c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685  c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528  c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956  C22.602,0.567,25.338,0.567,26.285,2.486z"/>
                                                            </svg>
                                                        </div>
                                                        <p class="desc">{{ strlen($data->deskripsi) > 150 ? substr($data->deskripsi, 0, 150).'...' : $data->deskripsi }}</p>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="text-center">
                                                    Buku yang Anda cari tidak ditemukan.
                                                </div>
                                                @endforelse
                                </div>
                            </div>
                            <div class="content__wrap">
                                <div class="d-flex justify-content-between pt-xl-3">
                                    {{$results->withQueryString()->links()}}
                                </div>                                
                            </div>
                        </div>

                    </div>

                </div>
            </div>
@endsection

