@extends('layouts.app')
@push('css')
<style type="text/css">
    a {
        text-decoration: none;
    }

    h4 {
        font-family: Poppins;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card px-4 py-2">
                <div class="card-body">
                    <h4 class="my-auto text-center">Aktivasi Akun</h4>
                    @if(isset($message))
                    <div class="mt-3 alert {{$alert_class}}" role="alert">
                        {{$message}}
                    </div>
                        @if($alert_class == 'alert-success')
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <a href="{{route('login')}}" class="btn btn-success fs-6 w-100">
                                    Login
                                </a>
                            </div>
                        </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection