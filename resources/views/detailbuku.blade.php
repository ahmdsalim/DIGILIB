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
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0 '); // Proxies.
@endphp

@push('css')
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endpush

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
                                        <img src="{{ asset('img/thumbnail-buku/' . $buku->thumbnail) }}" class="thumbnail">
                                    @else
                                        <img src="{{ asset('img/default-pict.png') }}" class="thumbnail">
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
                                <div class="col-md-12 mb-3 border-bottom">
                                    <div class="pb-1 d-flex align-items-center">
                                        <small class="">Kontributor: {{ $buku->user->nama }}</small>
                                        @if (isAuth())
                                            <div class="flex-grow g-2 ms-auto">
                                                <div class="d-flex flex-row gap-1 align-items-end">

                                                    <div>
                                                        <a href="{{ route('read', ['id' => $buku->id, 'slug' => $buku->slug]) }}"
                                                            class="btn btn-sm btn-outline-light">
                                                            <svg width="15" fill="#373c43" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" stroke="#373c43"
                                                                stroke-width="0.00020000000000000003">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke="#CCCCCC"
                                                                    stroke-width="0.43200000000000005"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <g id="read">
                                                                        <g>
                                                                            <path
                                                                                d="M12,18.883a10.8,10.8,0,0,1-9.675-5.728,2.6,2.6,0,0,1,0-2.31A10.8,10.8,0,0,1,12,5.117a10.8,10.8,0,0,1,9.675,5.728h0a2.6,2.6,0,0,1,0,2.31A10.8,10.8,0,0,1,12,18.883ZM12,6.117a9.787,9.787,0,0,0-8.78,5.176,1.586,1.586,0,0,0,0,1.415A9.788,9.788,0,0,0,12,17.883a9.787,9.787,0,0,0,8.78-5.176,1.584,1.584,0,0,0,0-1.414h0A9.787,9.787,0,0,0,12,6.117Z">
                                                                            </path>
                                                                            <path
                                                                                d="M12,16.049A4.049,4.049,0,1,1,16.049,12,4.054,4.054,0,0,1,12,16.049Zm0-7.1A3.049,3.049,0,1,0,15.049,12,3.052,3.052,0,0,0,12,8.951Z">
                                                                            </path>
                                                                            <circle cx="12" cy="12"
                                                                                r="2.028">
                                                                            </circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            Baca
                                                        </a>
                                                    </div>
                                                    <div>

                                                        <button id="btnCollection" type="button"
                                                            class="btn btn-sm btn-outline-light"
                                                            data-id="{{ Crypt::encryptString($buku->id) }}"
                                                            data-collected="{{ $buku->collectedBy(auth()->user()) ? 'true' : 'false' }}"
                                                            data-baseurl="{{ url('') }}">
                                                            <svg id="collectionIcon" width="17" viewBox="0 0 24 24"
                                                                fill="{{ $buku->collectedBy(auth()->user()) ? '#373c43' : 'none' }}"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M15.75 5H8.25C7.55964 5 7 5.58763 7 6.3125V19L12 15.5L17 19V6.3125C17 5.58763 16.4404 5 15.75 5Z"
                                                                        stroke="#373c43" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="card-title">{{ $buku->judul }}</h3>
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
                                                    <a href="#" id="readLessBtn" style="display: none;">Read
                                                        Less</a>
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
                                                <h5 class="mb-1">No ISBN</h5>
                                                {{ $buku->no_isbn }}
                                            </address>
                                        </div>
                                        <div class="col-md-6 right">
                                            <address class="mb-4 mb-md-0">
                                                <h5 class="mb-1">Penulis</h5>
                                                {{ $buku->penulis }}
                                            </address>
                                        </div>
                                    </div>
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
                                                <h5 class="mb-1">Jumlah Dibaca</h5>
                                                {{ $buku->jumlah_baca ?? 'Belum ada pembaca' }}<br>
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
                                                <h5 class="mb-1">Rating</h5>
                                                @if (!$userHasRated)
                                                    <form id="ratingForm" action="{{ route('rating.store') }}"
                                                        method="POST" autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $buku->id }}">
                                                        <input type="hidden" name="slug"
                                                            value="{{ $buku->slug }}">
                                                        <p class="m-0 font-weight-bold ">Rate This Book</p>
                                                        <div class="form-group row">
                                                            <input type="hidden" name="booking_id">
                                                            <div class="col">
                                                                <div class="rate">
                                                                    <input type="radio" checked id="star5"
                                                                        class="rate" name="score" value="5" />
                                                                    <label for="star5" title="text">5
                                                                        stars</label>
                                                                    <input type="radio" id="star4" class="rate"
                                                                        name="score" value="4" />
                                                                    <label for="star4" title="text">4
                                                                        stars</label>
                                                                    <input type="radio" id="star3" class="rate"
                                                                        name="score" value="3" />
                                                                    <label for="star3" title="text">3
                                                                        stars</label>
                                                                    <input type="radio" id="star2" class="rate"
                                                                        name="score" value="2">
                                                                    <label for="star2" title="text">2
                                                                        stars</label>
                                                                    <input type="radio" id="star1" class="rate"
                                                                        name="score" value="1" />
                                                                    <label for="star1" title="text">1
                                                                        star</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-grid">
                                                            <button id="sumbitRating"
                                                                class="btn btn-sm btn-primary btn-block">Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                @else
                                                    <div class="d-flex flex-row gap-1 align-items-center">
                                                        <i><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24">
                                                                <path fill="#ffc700"
                                                                    d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275L5.825 22Z" />
                                                            </svg></i>
                                                        <label>{{round($avgRating,2)}} / {{ $countVoter }} Votes</label> <br>
                                                    </div>
                                                @endif
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
        $(document).ready(function() {
            $('#submitRating').click(function(e) {
                e.preventDefault();

                var formData = $('#ratingForm').serialize();
                var id = $('[name="id"]').val(); // Ambil nilai 'id'
                var slug = $('[name="slug"]').val(); // Ambil nilai 'slug'

                $.ajax({
                    type: 'POST',
                    url: "{{ route('rating.store') }}",
                    data: formData,
                    success: function(response) {
                        toastr.success('Rating Telah Di Masukan');
                    },
                    error: function(error) {
                        // Handle the error response here
                        alert('Error: ' + error.responseText);
                    }
                });
            });
        });
    </script>

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
            box-shadow: 0 0.125rem 0.25rem rgba(55, 60, 67, .075);
            max-width: 100%;
            height: 250px;
            width: 190px;
            object-fit: cover;
        }
    </style>
@endpush

@if (isAuth())
    @push('js')
        <script type="text/javascript">
            const btnCollection = document.getElementById('btnCollection')
            const collectionIcon = document.getElementById('collectionIcon')

            btnCollection.addEventListener('click', async () => {
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

                    if (data.message === 'collected' || data.message === 'uncollected') {
                        collectionIcon.style.fill = collected ? 'none' : '#373c43'
                        btnCollection.setAttribute('data-collected', collected ? 'false' : 'true')
                    }
                } catch (error) {
                    console.error('Error:', error)
                }
            })
        </script>
    @endpush
@endif
