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
                                        <p class="mb-0">Rata-rata Waktu Baca</p>
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
                                        <p class="mb-0">Pengguna</p>
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
                                        <p class="mb-0">Buku</p>
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
                                        <h5 class="h2 mb-0">{{ round($avg_haldibaca) }}</h5>
                                        <p class="mb-0">Rata-rata Halaman Dibaca</p>
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

                            <!-- News Feed -->
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">News Feed</h5>
                                </div>
                                <div class="card-body p-0 overflow-scroll scrollable-content" style="height: 350px;">

                                    <div class="card-body">
                                        <h5>Uniform gramma</h5>
                                        <p>To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                        <div class="mt-4 pt-3 border-top d-flex align-items-center gap-2">
                                            <div class="badge bg-info">Feature Request</div>
                                            <div class="badge bg-danger">Bug</div>
                                        </div>
                                    </div>

                                    <div class="card-body bg-gray-200">
                                        <h5>River</h5>
                                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <div class="mt-2 pt-2 border-top d-flex align-items-center">
                                            <div class="d-flex gap-1">
                                                <a href="#" class="btn btn-hover btn-primary px-2 py-1">
                                                    <i class="demo-pli-heart-2 fs-5 me-2"></i>87
                                                </a>
                                                <a href="#" class="btn btn-hover btn-primary px-2 py-1">
                                                    <i class="demo-pli-speech-bubble-4 fs-5 me-2"></i>107
                                                </a>
                                            </div>
                                            <small class="text-muted ms-auto">9:25AM</small>
                                        </div>
                                    </div>

                                    <img class="img-fluid" src="../assets/img/sample-img/img-3.jpg" alt="sunrice" loading="lazy">
                                    <div class="card-body">
                                        <h5>Just me</h5>
                                        <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.</p>
                                        <div class="mt-2 pt-2 border-top d-flex align-items-center">
                                            <a href="#" class="btn btn-hover btn-primary px-2 py-1">
                                                <i class="demo-pli-heart-2 fs-5 me-2"></i>37k
                                            </a>
                                            <small class="text-muted ms-auto">06:13PM</small>
                                        </div>
                                    </div>

                                    <div class="card-body bg-gray-200">
                                        <h5>Languages</h5>
                                        <p>The European languages are members of the same family. Their separate existence is a myth.</p>
                                        <div class="mt-2 pt-3 border-top d-flex align-items-center">
                                            <div class="position-relative">
                                                <img class="img-xs rounded-circle me-2" src="../assets/img/profile-photos/1.png" alt="task-user">
                                                <a href="#" class="text-head fw-semibold stretched-link btn-link text-decoration-underline">Aaron Chavez</a>
                                            </div>
                                            <small class="text-muted ms-auto">10:45AM</small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END : News Feed -->

                        </div>
                        <div class="col-md-6 mb-3">

                            <!-- Top Users table -->
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">Top Users</h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>User</th>
                                                    <th>Order date</th>
                                                    <th class="text-center">Plan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">34521</td>
                                                    <td><a href="#" class="btn-link">Scott S. Calabrese</a></td>
                                                    <td><span class="text-muted">Oct 10, 2021</span></td>
                                                    <td><span class="d-block badge bg-purple">Bussines</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">23422</td>
                                                    <td><a href="#" class="btn-link">Teresa L. Doe</a></td>
                                                    <td><span class="text-muted">Oct 22, 2021</span></td>
                                                    <td><span class="d-block badge bg-info">Personal</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">73455</td>
                                                    <td><a href="#" class="btn-link">Steve N. Horton</a></td>
                                                    <td><span class="text-muted">Oct 22, 2021</span></td>
                                                    <td><span class="d-block badge bg-warning">Trial</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">34523</td>
                                                    <td><a href="#" class="btn-link">Charles S Boyle</a></td>
                                                    <td><span class="text-muted">Nov 03, 2021</span></td>
                                                    <td><span class="d-block badge bg-purple">Bussines</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">74634</td>
                                                    <td><a href="#" class="btn-link">Lucy Doe</a></td>
                                                    <td><span class="text-muted">Nov 05, 2021</span></td>
                                                    <td><span class="d-block badge bg-success">Special</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">23423</td>
                                                    <td><a href="#" class="btn-link">Michael Bunr</a></td>
                                                    <td><span class="text-muted">Nov 07, 2021</span></td>
                                                    <td><span class="d-block badge bg-info">Personal</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">23422</td>
                                                    <td><a href="#" class="btn-link">Teresa L. Doe</a></td>
                                                    <td><span class="text-muted">Nov 10, 2021</span></td>
                                                    <td><span class="d-block badge bg-info">Personal</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">73455</td>
                                                    <td><a href="#" class="btn-link">Steve N. Horton</a></td>
                                                    <td><span class="text-muted">Nov 10, 2021</span></td>
                                                    <td><span class="d-block badge bg-danger">VIP</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">34521</td>
                                                    <td><a href="#" class="btn-link">Scott S. Calabrese</a></td>
                                                    <td><span class="text-muted">Nov 11, 2021</span></td>
                                                    <td><span class="d-block badge bg-purple">Bussines</span></td>
                                                </tr>
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
