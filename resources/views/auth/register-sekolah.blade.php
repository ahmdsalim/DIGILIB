@extends('layouts.app')
@push('css')
<style type="text/css">
    a {
        text-decoration: none;
    }

    h4 {
        font-family: Poppins;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">
                <div class="card-body">
                    <h4 class="mb-3">Mendaftar sebagai Sekolah</h4>
                    @if(Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}}" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    <form class="row g-3" method="POST" action="{{ route('register.sekolah.store') }}">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">NPSN</label>
                            <input  type="number" class="form-control @error('npsn') is-invalid @enderror" name="npsn" value="{{ old('npsn') }}" required placeholder="Masukkan NPSN Sekolah" autofocus>

                            @error('npsn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Sekolah</label>
                            <input  type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required placeholder="Masukkan Nama Sekolah">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenjang</label>
                            <select  class="form-select @error('jenjang') is-invalid @enderror" name="jenjang" required="">
                               <option value="">Pilih Jenjang</option>
                               <option value="sma" @selected(old('jenjang') == 'sma')>SMA/Sederajat</option>
                               <option value="smp" @selected(old('jenjang') == 'smk')>SMP/Sederajat</option>
                               <option value="sd" @selected(old('jenjang') == 'siswa')>SD/Sederajat</option>
                            </select>
                            @error('jenjang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                      
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror" placeholder="081XXXXX" value="{{ old('telepon') }}" required="">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                           @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required="">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Provinsi Sekolah</label>
                            <select id="provinsiSelect" class="form-select @error('provinsi') is-invalid @enderror" name="provinsi" required="">
                            </select>
                            @error('provinsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    
                        </div>
                        <div class="col-md-6" id="kotaField" @if(!$errors->has('kota')) style="display: none;" @endif>
                            <label class="form-label">Kabupaten/Kota Sekolah</label>
                            <select id="kotaSelect" class="form-select col @error('kota') is-invalid @enderror" name="kota" required="">
                            </select>
                            @error('kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    
                        </div>
                        <div class="col-md-6" id="kecamatanField" @if(!$errors->has('kecamatan')) style="display: none;" @endif>
                            <label class="form-label">Kecamatan Sekolah</label>
                            <select id="kecamatanSelect" class="form-select @error('kecamatan') is-invalid @enderror" name="kecamatan" required="">
                            </select>
                            @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    
                        </div>
                        <div class="col-md-6" id="kelurahanField" @if(!$errors->has('kelurahan')) style="display: none;" @endif>
                            <label class="form-label">Kelurahan/Desa Sekolah</label>
                            <select id="kelurahanSelect" class="form-select @error('kelurahan') is-invalid @enderror" name="kelurahan" required="">
                            </select>
                            @error('kelurahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kata Sandi</label>
                            <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan kata sandi">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Masukkan ulang kata sandi">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-select').select2({
            width: '100%'
        });

       const provinsiSelect = document.getElementById('provinsiSelect')
       const provinsiField = document.getElementById('provinsiField')

       const kotaSelect = document.getElementById('kotaSelect')
       const kotaField = document.getElementById('kotaField')

       const kecamatanSelect = document.getElementById('kecamatanSelect')
       const kecamatanField = document.getElementById('kecamatanField')

       function toggleProvinsi(selected) {
          kelurahanSelect.innerHTML = ''
          kecamatanSelect.innerHTML = ''
          kotaSelect.innerHTML = ''

          kelurahanField.style.display = 'none';
          kecamatanField.style.display = 'none';
          kotaField.style.display = 'none';

          if (selected !== '') {
                const arrid = selected.split('-')
                getData(`https://ahmdsalim.github.io/api-wilayah-indonesia/api/regencies/${arrid[0]}.json`,kotaSelect)
                kotaField.style.display = 'block';
          }
       }

       function toggleKota(selected) {
          kelurahanSelect.innerHTML = ''
          kecamatanSelect.innerHTML = ''

          kelurahanField.style.display = 'none';
          kecamatanField.style.display = 'none';
           if (selected !== '') {
                const arrid = selected.split('-')
                getData(`https://ahmdsalim.github.io/api-wilayah-indonesia/api/districts/${arrid[0]}.json`,kecamatanSelect)
                kecamatanField.style.display = 'block';
          }
       }

       function toggleKecamatan(selected) {
          kelurahanSelect.innerHTML = ''

          kelurahanField.style.display = 'none';
           if (selected !== '') {
                const arrid = selected.split('-')
                getData(`https://ahmdsalim.github.io/api-wilayah-indonesia/api/villages/${arrid[0]}.json`,kelurahanSelect)
                kelurahanField.style.display = 'block';
          }
       }

       getData(`https://ahmdsalim.github.io/api-wilayah-indonesia/api/provinces.json`,provinsiSelect)

       $('#provinsiSelect').on('change', function() {
            toggleProvinsi(this.value);
        });

        $('#kotaSelect').on('change', function() {
            toggleKota(this.value);
        });

        $('#kecamatanSelect').on('change', function() {
            toggleKecamatan(this.value);
        });

       function getData(url,select) {
          fetch(url)
            .then(response => response.json())
            .then((data) => {
                var firstOpt = document.createElement('option')
                    firstOpt.value = ''
                    firstOpt.text = data.length > 0 ? 'Pilih' : 'Data tidak ditemukan'
                    select.appendChild(firstOpt)
                    if(data.length > 0){
                        data.forEach(function(item) {
                            var option = document.createElement('option')
                            option.value = `${item.id}-${item.name}`
                            option.text = item.name
                            select.appendChild(option)
                        })
                    }
            })
            .catch(function(err) {
                console.log(err)
            })
       }
    });
</script>
@endpush