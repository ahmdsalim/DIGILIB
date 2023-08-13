@extends('layouts.appnifty')
@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('sekolah.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('buku.index') }}">Buku</a></li>
        <li class="breadcrumb-item" ><a href="#">Detail Buku</a></li>
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

@endsection
