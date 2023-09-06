@extends('layouts.applanding')
@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Detail Buku</a></li>
    </ol>
@endsection

@section('pagetitle')
    <p class="lead">

    </p>
@endsection

@php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0 "); // Proxies.
@endphp

@section('content')
    <div class="content__boxed">
        <div class="content__wrap">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <div class="d-flex justify-content-center">
                                    @if ($buku->thumbnail)
                                        <img src="{{ asset('img/thumbnail-buku/' . $buku->thumbnail) }}"
                                            class="thumbnail" style="width: 230px; height:300px;">
                                    @else
                                        <img src="{{ asset('img/default-pict.png') }}" class="thumbnail"
                                            style="width: 230px; height:300px;">
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-9 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3" style="border-bottom: 1px solid grey">
                                    <address class="mb-4">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h6 class="card-text">Pengarang : {{$buku->penulis}}</h6>
                                            @if (isAuth())
                                            <a href="{{ route('read', ['id' => $buku->id, 'slug' => $buku->slug]) }}"
                                                class="btn btn-info btn-sm">Mulai Membaca</a>
                                            @else
                                            <a href="/login"
                                                class="btn btn-info btn-sm">Mulai Membaca</a>
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between mb-1">
                                            <h3 class="card-title">Judul : {{ $buku->judul }}</h3>
                                            @if(isAuth())
                                            <button id="btnCollection" type="button" class="btn btn-info btn-sm" data-id="{{ Crypt::encryptString($buku->id) }}" data-collected="{{ $buku->collectedBy(auth()->user()) ? 'true' : 'false' }}" data-baseurl="{{url('')}}">
                                                {{ $buku->collectedBy(auth()->user()) ? 'Hapus Koleksi' : 'Tambah Ke Koleksi' }}
                                            </button>
                                            @endif
                                        </div>
                                    </address>
                                </div>
                                <div class="col-md-12">
                                    <address class="mb-4 mb-md-0">
                                        <h4 class="mb-1">Deskripsi</h4>
                                        <div class="description">
                                            <p>
                                                @if (strlen($buku->deskripsi) > 100)
                                                    <span id="shortDescription">{{ $desk_awal }}...</span>
                                                    <span id="fullDescription"
                                                        style="display: none;">{{ $deskripsi }}</span>
                                                    <a href="#" id="readMoreBtn">Baca Selengkapnya</a>
                                                @else
                                                    {{ $buku->deskripsi }}
                                                @endif

                                                @if (strlen($buku->deskripsi) > 100)
                                                    <a href="#" id="readLessBtn" style="display: none;">Read Less</a>
                                                @endif
                                            </p>
                                        </div>
                                    </address>
                                </div>
                            </div>
                            <div class="contaier">
                                <h4>Detail</h4>
                                <div class="d-flex flex-column gap-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Kategori</h5>
                                                {{ $buku->kategori->kategori }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 right">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Penerbit</h5>
                                                {{ $buku->penerbit }}<br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Jumlah Halaman</h5>
                                                {{ $buku->jumlah_halaman }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 right">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Rating</h5>
                                                {{ $buku->rating->score ?? 'Belum ada rating' }} <br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Tahun terbit</h5>
                                                {{ $buku->tahun_terbit }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Jumlah Dibaca</h5>
                                                {{ $buku->jumlah_baca ?? 'Belum ada pembaca' }}<br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">No ISBN</h5>
                                                {{ $buku->no_isbn }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 right">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1"></h5>
                                                <div class="col-md-4">

                                                </div>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END : Basic card -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.getElementById("readMoreBtn").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("shortDescription").style.display = "none";
            document.getElementById("fullDescription").style.display = "inline";
            document.getElementById("readMoreBtn").style.display = "none";
            document.getElementById("readLessBtn").style.display = "inline";
        });

        document.getElementById("readLessBtn").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("shortDescription").style.display = "inline";
            document.getElementById("fullDescription").style.display = "none";
            document.getElementById("readMoreBtn").style.display = "inline";
            document.getElementById("readLessBtn").style.display = "none";
        });
    </script>
@endpush

@push('css')
<style type="text/css">
    .thumbnail {
    border-radius: 0.4375rem;
    box-shadow: 0 0.125rem 0.25rem rgba(55,60,67,.075);
    max-width: 100%;
    }
</style>
@endpush

@if(isAuth())
@push('js')
<script type="text/javascript">
    const btnCollection = document.getElementById('btnCollection')

    btnCollection.addEventListener('click',async () => {
        const bookId = btnCollection.getAttribute('data-id')
        const collected = btnCollection.getAttribute('data-collected') === 'true';
        const baseUrl = btnCollection.getAttribute('data-baseurl')
        const url = collected ? `${baseUrl}/api/collection/uncollect` : `${baseUrl}/api/collection/collect`
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        try {
            const response = await axios.post(url, {
                id: bookId
            }, {
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })

            const data = response.data

            if(data.message === 'collected' || data.message === 'uncollected'){
                btnCollection.textContent = collected ? 'Tambah Ke Koleksi' : 'Hapus Koleksi'
                btnCollection.setAttribute('data-collected', collected ? 'false' : 'true')
            }
        }catch(error){
            console.error('Error:', error)
        }
    })
</script>
@endpush
@endif
