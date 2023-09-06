@extends('layouts.applanding')
@section('content')

               <div class="content__boxed">
                   <div class="content__wrap">
                       <div class="row">
<div class="col-sm-6 col-xl-3">
                            <!-- User widget -->
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="{{asset('img/thumbnail-buku/'.$buku->thumbnail)}}">
                     </div>
                </div>
<div class="col-sm-18 col-xl-9">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                    <h6 class="card-text">Pengarang : Akmal</h6>
                    <a href="{{route('read',['id'=>$buku->id, 'slug'=>$buku->slug])}}" class="btn btn-info btn-sm">Mulai Membaca</a>
                </div>
                    <div class="d-flex justify-content-between mb-1">
                    <h3 class="card-title">{{$buku->judul}}</h3>
                    @if(isAuth())
                    <button id="btnCollection" type="button" class="btn btn-info btn-sm" data-id="{{ Crypt::encryptString($buku->id) }}" data-collected="{{ $buku->collectedBy(auth()->user()) ? 'true' : 'false' }}" data-baseurl="{{url('')}}">
                        {{ $buku->collectedBy(auth()->user()) ? 'Hapus Koleksi' : 'Koleksi' }}
                    </button>
                    @endif                                
                </div>
                    <div>
                    <h6 class="card-text" style="text-align: right;">Sudah Dibaca<br>{{$buku->jumlah_baca}}</h6>
                </div>
                </div>
                <div class="card-footer" style="border-top: 1px solid grey">
                    <div class="mb-4">
                    <h4 class="card-title">Deskripsi Buku</h4>
                    <h6 class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled...... </h6>
                    <h6 class="more-text">
                    Ini adalah teks tambahan yang akan disembunyikan.
                    </h6>
                    <h6 style="text-align: right;"><a href="#" class="read-more-link" >Baca Selengkapnya</a></h6>      
                </div>
                <div>
                                    <h6><table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th>Pengarang</th>
                                                <th>Tahun Terbit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$buku->penulis}}</td>
                                                <td>{{$buku->tahun_terbit}}</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Penerbit</th>
                                                <th>Jumlah Halaman</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$buku->penerbit}}</td>
                                                <td>{{$buku->jumlah_halaman}}</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>No.ISBN</th>
                                                <th>Rating</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$buku->no_isbn}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{$buku->kategori->kategori}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table></h6>
                </div>
        </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('css')
<style type="text/css">
        .card-img-top {
        height: 500px;
        object-fit: cover;
        }
    .more-text {
  display: none;
}
.show-more .more-text {
  display: block;
}
.like-button {
    background-color: white;
    border: none;
    cursor: pointer;
}

.like-button.liked {
    background-color: blue; /* Ganti dengan warna yang Anda inginkan */
    color: white;
}</style>
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
                btnCollection.textContent = collected ? 'Koleksi' : 'Hapus Koleksi'
                btnCollection.setAttribute('data-collected', collected ? 'false' : 'true')
            }
        }catch(error){
            console.error('Error:', error)
        }
    })
</script>
@endpush
@endif