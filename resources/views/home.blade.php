@extends('layouts.appnifty')

@section('content')
<div class="content__boxed"> 
   <div class="content__wrap">
                    <!-- Tiles -->
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-cyan text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-file-word fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{ round(($total_pembaca/$total_pengguna)*100).'%' }} <span class="fs-5">({{ $total_pembaca.'/'.$total_pengguna }})</span></h5>
                                        <p class="mb-0">Indeks Membaca</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>
                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-purple text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-file-zip fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{ round($avg_waktubaca_perhari, 2) }} <span class="fs-5">Menit</span></h5>
                                        <p class="mb-0">Rata<sup>2</sup> Waktu Baca (Perhari)</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>
                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-orange text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-camera-2 fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{$total_pengguna}}</h5>
                                        <p class="mb-0">Pengguna (Siswa/Guru)</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>
                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-pink text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-video fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{ $total_buku }}</h5>
                                        <p class="mb-0">Buku Dipublikasi</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-pink text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-video fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{ round($avg_haldibaca,2) }}</h5>
                                        <p class="mb-0">Rata<sup>2</sup> Hal Dibaca (Perhari)</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>

                        <div class="col-sm-6 col-lg-3">

                            <!-- Stat widget -->
                            <div class="card bg-purple text-white mb-3 mb-xl-3">
                                <div class="card-body py-3 d-flex align-items-stretch">
                                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-start">
                                        <i class="demo-psi-camera-2 fs-1"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="h2 mb-0">{{ $total_buku_dibaca }}</h5>
                                        <p class="mb-0">Buku yang Dibaca</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END : Stat widget -->

                        </div>
                    </div>
                    <!-- END : Tiles -->

                    <div class="row">
                        <div class="col-md-6 mb-3">

                            <!-- Top Users table -->
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">Top User</h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Nama User</th>
                                                    <th>Asal Sekolah</th>
                                                    <th class="text-center">Jumlah Baca</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($top_users as $user)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$user->userable->nama}}</td>
                                                    <td>{{$user->userable->sekolah->nama}}</td>
                                                    <td class="text-center">{{$user->total_baca}} kali</td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- END : Top Users table -->

                        </div>
                        <div class="col-md-6 mb-3">

                            <!-- Top Users table -->
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">Top Buku Terpopuler</h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Judul</th>
                                                    <th>Penulis</th>
                                                    <th>Dibaca</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($buku_terpopuler as $buku)
                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$buku->judul}}</td>
                                                    <td>{{$buku->penulis}}</td>
                                                    <td>{{$buku->jumlah_baca}} kali</td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- END : Top Users table -->

                        </div>
                    </div>

                </div>
</div>
@endsection
