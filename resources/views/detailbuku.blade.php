@extends('layouts.applanding')
<style type="text/css">
    .more-text {
  display: none;
}
.show-more .more-text {
  display: block;
}
</style>
@section('content')

               <div class="content__boxed">
                   <div class="content__wrap">
                       <div class="row">
<div class="col-sm-6 col-xl-3">
                            <!-- User widget -->
              <div class="card mb-4">
                <img class="card-img-top" alt="Card image cap" src="assets/img/Cover.jpg">
                     </div>
                </div>
<div class="col-sm-18 col-xl-9">
              <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                    <h6 class="card-text">Pengarang </h6>
                    <button type="button" class="btn btn-info btn-sm">
                        Baca
                    </button>                                  
                </div>
                    <div class="d-flex justify-content-between mb-1">
                    <h3 class="card-title">Proposal Penawaran</h3>
                    <button type="button" class="btn btn-info btn-sm">
                        <i class="demo-psi-heart-2 fs-5 me-2"></i> Wishlist
                    </button>                                  
                </div>
                    <div>
                    <h6 class="card-text" style="text-align: right;">Sudah Dibaca<br>...</h6>
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
                                                <td>Fulan</td>
                                                <td>19xx</td>
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
                                                <td>Fulan</td>
                                                <td>100</td>
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
                                                <td>xxx-xx-xx-x</td>
                                                <td>4,5</td>
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
                                                <td>Buku Jurnal</td>
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