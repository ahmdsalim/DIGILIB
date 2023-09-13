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

  input[type=radio] {
    border: 3px solid black;
  }
  
  .rating {
    display: block;
    position: unset;
    width: 150px;
    min-height: 31px;
    border: none;
    margin: 7% 0;
  }
  
  .rating > input {
    position: absolute;
    margin-right: -100%;
    opacity: 0;
  }
  
  .rating > input:checked ~ label,
  .rating > input:focus ~ label {
    background-position: 0 0;
  }
  
  .rating > input:checked + label,
  .rating > input:focus + label {
    background-position: 0 -30px;
  }
  
  .rating > input:hover ~ label {
    background-position: 0 0;
  }
  
  .rating > input:hover + label {
    background-position: 0 -30px;
  }
  
  .rating > input:hover + label:before {
    opacity: 1;
  }
  
  .rating > input:focus + label {
    outline: 1px dotted #999;
  }
  
  .rating .focus-ring {
    position: absolute;
    left: 0;
    width: 100%;
    height: 30px;
    outline: 2px dotted #999;
    pointer-events: none;
    opacity: 0;
  }
  
  .rating > .input-no-rate:focus ~ .focus-ring {
    opacity: 1;
  }
  
  .rating > label {
    position: relative;
    float: left;
    width: 30px;
    font-size: 0.1em;
    color: transparent;
    cursor: pointer;
    background-repeat: no-repeat;
    background-position: 0 -30px; 
  }
  
  .rating > label,
  .rating > label:before {
    height: 30px;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAA8CAMAAABGivqtAAAAxlBMVEUAAACZmZn2viTHuJ72viOampqampr1viSampr3vySampqdnZ34wiX1vSSampr1vSOZmZmampr1viT2vSOampr2viT2viSampr2viSampr2vyX4vyWbm5v3vSSdnZ32wSadnZ36wCWcnJyZmZn/wSr/2ySampr2vSP2viSZmZn2vSSZmZn2vST2viSampr2viSbm5ubm5uZmZn1vSSampqbm5v2vSWampqampr3vSf5wiT5vyagoKD/xCmkpKT/yCSZmZn1vSO4V2dEAAAAQHRSTlMA+vsG9fO6uqdgRSIi7+3q39XVqZWVgnJyX09HPDw1NTAwKRkYB+jh3L6+srKijY2Ef2lpYllZUU5CKigWFQ4Oneh1twAAAZlJREFUOMuV0mdzAiEQBmDgWq4YTWIvKRqT2Htv8P//VJCTGfYQZnw/3fJ4tyO76KE0m1b2fZu+U/pu4QGlA7N+Up5PIz9d+cmkbSrSNr9seT3GKeNYIyeO5j16S28exY5suK0U/QKmmeCCX6xs22hJLVkitMImxCvEs8EG3SCRCN/ViFPqnq5epIzZ07QJJvkM9Tkz1xnkmXbfSvR7f4H8AtXBkLGj74mMvjM1+VHZpAZ4LM4K/LBWEI9jwP71v1ZEQ6dyvQMf8A/1pmdZnKce/VH1iIsdte4U8VEtY23xOujxtFpWDgKbfjD2YeEhY0OzfjGeLyO/XfnNpAcmcjDwKOXRfU1IyiTRyEkaiz67pb9oJHJb9vVqKfgjLBPyF5Sq9T0KmSUhQmtiQrJGPHVi0DoSabj31G2gW3buHd0pY85lNdcCk8xlNDPXMuSyNiwl+theIb9C7RLIpKvviYy+M6H8qGwSAp6Is19+GP6KxwnggJ/kq6Jht5rnRQA4z9zyRRaXssvyqp5I6Vutv0vkpJaJtnjpz/8B19ytIayazLoAAAAASUVORK5CYII=");
  }
  
  .star > label:before {
    content: "";
    position: absolute;
    display: block;
    background-position: 0 30px;
    pointer-events: none;
    opacity: 0;
  }
  
  .star > label:nth-of-type(5):before {
    width: 120px;
    left: -120px;
  }
  
  .star > label:nth-of-type(4):before {
    width: 90px;
    left: -90px;
  }
  
  .star > label:nth-of-type(3):before {
    width: 60px;
    left: -60px;
  }
  
  .star > label:nth-of-type(2):before {
    width: 30px;
    left: -30px;
  }
  
  .star > label:nth-of-type(1):before {
    width: 0;
    left: 0;
  }
  
  @media screen and (-webkit-min-device-pixel-ratio: 2),
    screen and (min-resolution: 192dpi) {
    .star > label {
       background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAB4CAMAAACZ62E6AAABAlBMVEUAAACZmZmampr2vSObm5v/yiufn5+ampr1viP1viSZmZn2viOZmZmampqampr2viSampqampqcnJz5vyScnJz3wSf/wyn/xiujo6Oqqqr/0C/1vSOampr2viP2viOampr2viP2vST2viOampqampqampr1vyP3viSampr2vyT4vyX3viSbm5ubm5v5wCT8xSmgoKCampqampr3vyb2wiWenp72viOampqZmZmampr2viP2viP1viSampqbm5v2vyT3viObm5v4vyadnZ34wSSbm5v2viSZmZn2viP2vST2viP2viT1viOZmZn2viT2viX3viT3vyb2vyOZmZn1vSOZmZlNN+fKAAAAVHRSTlMA9uz4PQwS8O7r5+fTw4yMelw2MB0dFRELBgbS+/Hfu7uxqKWdg4N7ZmZMPi8pKRgPs0w7Nhb14drKw6Gck21tXkNDIyMZ1rDLycTBtaqVknlfV0sGP8ZwAAADW0lEQVRYw9zWvYqDQBSG4TPDoCAqKhYKQgoVLFaIgZCkiCBBUqVazv3fyu4aEXWdM85Uy779A+LP58AfTQgw73AwtxFiZIwbxMbUfuB3H4b49YNfZrbGodoI52+cm9hH9sbZwwAXOFbo2zjDsSzWxnecuuvaM8MpdtbEPs7y9azF5phZWrjERaWOPdpLbB81cICrgv3W4mvMLbU6RmFQeA5u5HhFEEbHLdWLsMxvHJXxW16Goh+ZqPyny1Az5j79SsCJoWHsBNAxQ9sNF26bWFuMC8v1LY+mmeTadjaqtaNnnXoxWBcde1nNWnzdb68xrOqvu22/MTzuPutujpJ122NvluSb8tTWk85CclDZQwLS0oa2TQpEKacsJy0kSJaQOKJxROKKxhWJ7zS+k9ijsUdim8Y2ZWNUFBP4pMKfOv8onX9WrsI5gd3VVLXtatxcuU0znGUHCUAS2DgrS6mT6hTzrXEjfIZj5Dk2xKkihqm4wKlQfQRqalhUP9UHo3FIPAG/Et44JVLsDDf0JHmB3OEByOwZES8hSAsviGjBdh3ylh6plmMnW4IyAUVJWcE/76vTell1EIaiMBwIAcWBA9GC0lIdKFXQQUsHVVCklN7ojf3+z3JOxYqK2TH555+K6CJJQtRbr9XtDmCnjH0AX9Va8J+liIMvDtRsCk2pEs6hKVexR2g7KuDihwt5a9MfprY0fkLXU9ZmFLpoJolN6GXKWWfZx0tHCocwKJSxC22ItYUEjmBUJHFjfYz1xQxlfaLiZsBExq2IPtbkNbLtOwwuGgjTLkH43mYtSzam7+1Bsr3nm5uExBQUozEh9V7N7uvmwZcqdpm0C6vJW63bZEuXtbrV2zpDzhrpYLBWMnY1mjV7JWFtMio7zbWniWFxvHnWm1yGxXmOPXP+L3YV2ysjnNhaZNeMcHPvuL27BMnVMaujljBAYyje4niH4g2ONyh+4PiB4gOODyjWcKxh1gZBNoJjEY4R/BLhF4IDEQ4QPBoEoyxH4+bxrUsHyxwxQlg0WHXqYifVLmo67cKY/UtaXFxBV26TLjuHrkp8BPJTMij1xQejdkgO24nf7dBOCRcbzQuNOR9Qs64GzzrfQa8It2oFAA6Zrga9xEeq1KHmLUHIiCAWInsg1x/MLqkMsItF8QAAAABJRU5ErkJggg==");
    }
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
                                        <img src="{{ asset('img/thumbnail-buku/' . $buku->thumbnail) }}"
                                            class="thumbnail">
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
                                        @if(isAuth())
                                        <div class="flex-grow g-2 ms-auto">
                                            {{-- <div class="rating">
                                                <input type="radio" id="no-rate" class="input-no-rate"
                                                    name="score" value="0" checked=""
                                                    aria-label="No rating.">
                                            
                                                <input type="radio" id="rate1" name="score" value="1"
                                                    {{ $buku->score == '1' ? 'checked' : '' }}>
                                                <label for="rate1">1 star</label>
                                            
                                                <input type="radio" id="rate2" name="score" value="2"
                                                    {{ $buku->score == '2' ? 'checked' : '' }}>
                                                <label for="rate2">2 stars</label>
                                            
                                                <input type="radio" id="rate3" name="score" value="3"
                                                    {{ $buku->score == '3' ? 'checked' : '' }}>
                                                <label for="rate3">3 stars</label>
                                            
                                                <input type="radio" id="rate4" name="score" value="4"
                                                    {{ $buku->score == '4' ? 'checked' : '' }}>
                                                <label for="rate4">4 stars</label>
                                            
                                                <input type="radio" id="rate5" name="score" value="5"
                                                    {{ $buku->score == '5' ? 'checked' : '' }}>
                                                <label for="rate5">5 stars</label>
                                            </div> --}}
                                            <button id="btnCollection" type="button" class="btn btn-sm btn-primary" data-id="{{ Crypt::encryptString($buku->id) }}" data-collected="{{ $buku->collectedBy(auth()->user()) ? 'true' : 'false' }}" data-baseurl="{{ url('') }}">
                                                <svg id="collectionIcon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="{{ $buku->collectedBy(auth()->user()) ? 'currentcolor' : 'none' }}" viewBox="0 0 24 24" class="icon" style="color: currentcolor;"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 21-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16Z"></path></svg>
                                            </button>
                                            <a href="{{ route('read', ['id' => $buku->id, 'slug' => $buku->slug]) }}" class="btn btn-sm btn-dark">
                                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" style="color: currentcolor;"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                                Baca
                                            </a>
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
    <script>
        $(document).ready(function () {
            $('input[type="radio"]').on('change', function () {
                var score = $('input[name="score"]:checked').val();
    
                $.ajax({
                    url: '{{ route('rating.store') }}',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'score': score
                    },
                    success: function (response) {
                        // Tindakan yang perlu dilakukan setelah peringkat disimpan
                        console.log('Rating berhasil disimpan.');
                    },
                    error: function (error) {
                        // Tindakan yang perlu dilakukan jika terjadi kesalahan
                        console.error('Terjadi kesalahan saat menyimpan rating.');
                    }
                });
            });
        });
    </script>
@endpush

@push('css')
<style type="text/css">
    .thumbnail {
    border-radius: 0.4375rem;
    box-shadow: 0 0.125rem 0.25rem rgba(55,60,67,.075);
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
                        collectionIcon.style.fill = collected ? 'none' : 'currentcolor'
                        btnCollection.setAttribute('data-collected', collected ? 'false' : 'true')
                    }
                } catch (error) {
                    console.error('Error:', error)
                }
            })
        </script>
    @endpush
@endif
