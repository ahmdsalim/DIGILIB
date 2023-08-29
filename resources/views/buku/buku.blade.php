@extends('layouts.appnifty')
@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('sekolah.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('buku.index') }}">Buku</a></li>
    </ol>
@endsection

@section('pagetitle')
    <h1 class="page-title mb-0 mt-2">{{ $tittle }}</h1>
    {{-- <p class="lead">
        A widget is an element of a graphical user interface that displays information or provides a specific way for a user
        to interact.
    </p> --}}
@endsection

@section('content')
    <div class="content__boxed">
        <div class="content__wrap">
            <div class="row">
                <div class="col-xl-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-3">{{ $header }}</h5>
                            <div class="row">
                                <!-- Left toolbar -->
                                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                    <a href="{{ route('buku.create') }}"
                                        class="btn btn-primary hstack gap-2 align-self-center">
                                        <i class="demo-psi-add fs-5"></i>
                                        <span class="vr"></span>
                                        Tambah Data
                                    </a>
                                    <button class="btn btn-icon btn-outline-light">
                                        <i class="demo-pli-printer fs-5"></i>
                                    </button>
                                    <div class="btn-group">

                                        <div class="btn-group dropdown">
                                            <button class="btn btn-icon btn-outline-light" data-bs-toggle="dropdown"
                                                aria-expanded="false"><svg fill="none" stroke="currentColor"
                                                    stroke-width="1.5" width="18" height="18" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                                    </path>
                                                </svg>
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#">PDF</a></li>
                                                <li><a class="dropdown-item" href="#">Excel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- END : Left toolbar -->

                                <!-- Right Toolbar -->
                                <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">

                                    <div class="header-searchbox">
                                        <!-- Searchbox toggler for small devices -->
                                        <label for="header-search-input"
                                            class=" header__btn d-md-none btn btn-icon rounded-pill shadow-none border-0 btn-sm"
                                            type="button">
                                            <i class="demo-psi-magnifi-glass"></i>
                                        </label>
                                        <!-- Searchbox input -->
                                        <form action="{{ route('buku.index') }}" method="GET"
                                            class="searchbox searchbox--auto-expand searchbox--hide-btn input-group">
                                            <input id="header-search-input" name="search"
                                                class="searchbox__input form-control " type="search"
                                                placeholder="Cari {{ $tittle }}..." aria-label="Search">
                                            <div class="searchbox__backdrop">
                                                <button
                                                    class="searchbox__btn header__btn btn btn-icon rounded shadow-none border-0 btn-sm"
                                                    type="button" id="button-addon2">
                                                    <i class="demo-pli-magnifi-glass"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END : Right Toolbar -->

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <div class="table-responsive text-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Foto</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>No ISBN</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($data->isEmpty())
                                                <tr>
                                                    <td colspan="9">
                                                        <div class="col-sm-12 col-md-12 text-center">
                                                            {{ $kosong }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($data as $index => $buku)
                                                    <tr class="align-middle">
                                                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                                                        <td>
                                                            <img src="{{ asset('img/thumbnail-buku/' . $buku->thumbnail) }}"
                                                                alt="" style="width: 50px;">
                                                        </td>
                                                        <td>{{ $buku->judul }}</td>
                                                        <td>{{ $buku->kategori->kategori }}</td>
                                                        <td>{{ $buku->penulis }}</td>
                                                        <td>{{ $buku->penerbit }}</td>
                                                        <td>{{ $buku->no_isbn }}</td>
                                                        <td class="fs-5">
                                                            @if ($buku->status == 'publish')
                                                                <div class="badge d-block bg-success">Publish</div>
                                                            @elseif ($buku->status == 'rejected')
                                                                <div class="badge d-block bg-danger">Rejected</div>
                                                            @else
                                                                <div class="badge d-block bg-secondary">Pending</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="d-flex gap-2 justify-content-center text-nowrap text-center">
                                                                <a href="{{ route('buku.edit', $buku->id) }}"
                                                                    class="btn btn-icon btn-sm btn-light"><svg
                                                                        fill="none" stroke="currentColor"
                                                                        stroke-width="1.5" width="18" height="18"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                                                        </path>
                                                                    </svg></a>

                                                                @if ($buku->status == 'rejected')
                                                                    <a href="#"
                                                                        class="btn btn-icon btn-sm btn-light dlt-buku"
                                                                        data-id="{{ $buku->id }}"
                                                                        data-name="{{ $buku->judul }}"><svg
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-width="1.5" width="18"
                                                                            height="18" viewBox="0 0 24 24"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            aria-hidden="true">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                                                            </path>
                                                                        </svg></a>

                                                                    <form action="{{ route('buku.resend', $buku->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT') {{-- Tambahkan ini untuk menggunakan method PUT --}}
                                                                        <input type="hidden" name="action"
                                                                            value="resend">
                                                                        {{-- Nilai "terima" untuk tombol Terima --}}
                                                                        <button type="submit"
                                                                            class="btn btn-icon btn-sm btn-light"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="18" height="18"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="currentColor"
                                                                                    d="M17.65 6.35a7.95 7.95 0 0 0-6.48-2.31c-3.67.37-6.69 3.35-7.1 7.02C3.52 15.91 7.27 20 12 20a7.98 7.98 0 0 0 7.21-4.56c.32-.67-.16-1.44-.9-1.44c-.37 0-.72.2-.88.53a5.994 5.994 0 0 1-6.8 3.31c-2.22-.49-4.01-2.3-4.48-4.52A6.002 6.002 0 0 1 12 6c1.66 0 3.14.69 4.22 1.78l-1.51 1.51c-.63.63-.19 1.71.7 1.71H19c.55 0 1-.45 1-1V6.41c0-.89-1.08-1.34-1.71-.71l-.64.65z" />
                                                                            </svg></button>
                                                                    </form>
                                                                @endif

                                                                <button href="{{ route('buku.show', $buku->slug) }}"
                                                                    class="btn btn-icon btn-sm btn-light"><svg
                                                                        fill="none" stroke="currentColor"
                                                                        stroke-width="1.5" width="18" height="18"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244">
                                                                        </path>
                                                                    </svg>

                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card-footer">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('.dlt-buku').click(function() {
                var idbuku = $(this).attr('data-id');
                var buku = $(this).attr('data-name');

                Swal.fire({
                    title: 'Apakah Anda Yakin??',
                    text: "Kamu akan menghapus data " + buku + "",
                    icon: 'warning',
                    showCancelButton: true,
                    buttons: true,
                    dangerMode: true,
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim permintaan DELETE dengan JavaScript
                        $.ajax({
                            url: '/buku/' + idbuku,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Data ' + buku + ' Telah Dihapus',
                                    'success'
                                );
                                // Redirect ke halaman yang sesuai
                                window.location.href = '/buku';
                            },
                            error: function(xhr) {
                                console.log(xhr);
                                Swal.fire(
                                    'Error!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
