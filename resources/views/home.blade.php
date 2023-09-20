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
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M23 24c-3.6 0-5.03-4.176-6.413-8.214C15.277 11.958 13.92 8 11 8a3.44 3.44 0 0 0-3.053 2.321L6.05 9.684C6.101 9.534 7.321 6 11 6c4.35 0 6.012 4.855 7.48 9.138C19.689 18.667 20.83 22 23 22a3.44 3.44 0 0 0 3.053-2.321l1.896.637C27.899 20.466 26.679 24 23 24Z" />
                                    <path fill="currentColor" d="M4 28V17h2v-2H4V2H2v26a2 2 0 0 0 2 2h26v-2Z" />
                                    <path fill="currentColor"
                                        d="M8 15h2v2H8zm4 0h2v2h-2zm8 0h2v2h-2zm4 0h2v2h-2zm4 0h2v2h-2z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="h2 mb-0">{{ round(($total_pembaca / $total_pengguna) * 100) . '%' }} <span
                                        class="fs-5">({{ $total_pembaca . '/' . $total_pengguna }})</span></h5>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M128 40a96 96 0 1 0 96 96a96.11 96.11 0 0 0-96-96Zm0 176a80 80 0 1 1 80-80a80.09 80.09 0 0 1-80 80Zm45.66-125.66a8 8 0 0 1 0 11.36l-40 40a8 8 0 0 1-11.36-11.36l40-40a8 8 0 0 1 11.36 0ZM96 16a8 8 0 0 1 8-8h48a8 8 0 0 1 0 16h-48a8 8 0 0 1-8-8Z" />
                                </svg>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="h2 mb-0">{{ round($avg_waktubaca_perhari, 2) }} <span class="fs-5">Menit</span>
                                </h5>
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
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" width="36" height="36"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    style="margin-right: 4px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="h2 mb-0">{{ $total_pengguna }}</h5>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8Zm-8 160H72a31.82 31.82 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z" />
                                </svg>
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
                                <svg fill="none" stroke="currentColor" stroke-width="1.5" width="36" height="36"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="h2 mb-0">{{ round($avg_haldibaca, 2) }}</h5>
                                <p class="mb-0">Rata<sup>2</sup> Halaman Dibaca</p>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893c1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493c-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752c1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81c-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02c1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877c1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                </svg>
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
                                <p>To achieve this, it would be necessary to have uniform grammar, pronunciation and more
                                    common words.</p>
                                <div class="mt-4 pt-3 border-top d-flex align-items-center gap-2">
                                    <div class="badge bg-info">Feature Request</div>
                                    <div class="badge bg-danger">Bug</div>
                                </div>
                            </div>

                            <div class="card-body bg-gray-200">
                                <h5>River</h5>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                                    your mouth.</p>
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

                            <img class="img-fluid" src="../assets/img/sample-img/img-3.jpg" alt="sunrice"
                                loading="lazy">
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
                                <p>The European languages are members of the same family. Their separate existence is a
                                    myth.</p>
                                <div class="mt-2 pt-3 border-top d-flex align-items-center">
                                    <div class="position-relative">
                                        <img class="img-xs rounded-circle me-2" src="../assets/img/profile-photos/1.png"
                                            alt="task-user">
                                        <a href="#"
                                            class="text-head fw-semibold stretched-link btn-link text-decoration-underline">Aaron
                                            Chavez</a>
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
