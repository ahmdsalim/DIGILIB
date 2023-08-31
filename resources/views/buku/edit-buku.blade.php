@extends('layouts.appnifty')
@section('breadcrumb')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('sekolah.index') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('buku.index') }}">Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $header }}</a></li>
    </ol>
@endsection

@section('pagetitle')
    <h1 class="page-title mb-0 mt-2">{{ $tittle }}</h1>
    {{-- <p class="lead">
        A widget is an element of a graphical user interface that displays information or provides a specific way for a user
        to interact.
    </p> --}}
@endsection

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
<style>

</style>

@section('content')
    <div class="content__boxed">
        <div class="content__wrap">
            <section>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $header }}</h5>
                                <!-- Block styled form -->
                                <form action="{{ route('buku.update',$buku->id) }}" method="post" class="needs-validation" novalidate
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="p-2 m-2 ">
                                                    <div class="text-center">
                                                        <img id="thumbnail-preview"
                                                            src="{{ asset('img/thumbnail-buku/' . $buku->thumbnail) }}"
                                                            style="width:100px; height:120px;"
                                                            class="rounded object-fit-cover"
                                                            alt="placeholder">
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control" accept="image/*"
                                                onchange="updatePreview(this, 'thumbnail-preview')">
                                            <small class="form-text text-muted">
                                                Ukuran thumbnail harus 3x4
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="p-2 m-2">
                                                    <div class="text-center">
                                                        <div id="slide-preview-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Slide</label>
                                            <input type="file" id="slide-input" name="slide[]" multiple class="form-control" accept="image/*"
                                                onchange="updateMultiPreview('slide-input', 'slide-preview-container')">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-2">
                                        <label class="M">Kategori</label>
                                        <select
                                            class="form-control select2 
                                                    @error('kategori_id')
                                                        is-invalid
                                                    @enderror"
                                            name="kategori_id" id="category">
                                            <option value="{{ $buku->kategori->id }}">{{ $buku->kategori->kategori }}</option>
                                            @foreach ($kategori as $index => $kat)
                                                <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="_dm-inputAddress" class="form-label">Judul Buku</label>
                                        <input id="_dm-inputAddress" name="judul" placeholder="Masukan Judul"
                                            value="{{ $buku->judul }}"
                                            class="form-control 
                                        @error('judul')
                                            is-invalid
                                        @enderror">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="_dm-inputAddress" class="form-label">Pengarang</label>
                                        <input id="_dm-inputAddress" name="penulis" placeholder="Masukan pengarang"
                                            value="{{ $buku->penulis }}"
                                            class="form-control 
                                        @error('penulis')
                                            is-invalid
                                        @enderror">
                                        @error('penulis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="col-12 mt-2">
                                            <label for="_dm-inputAddress" class="form-label">Penerbit</label>
                                            <input id="_dm-inputAddress" name="penerbit" placeholder="Masukan penerbit"
                                                value="{{ $buku->penerbit }}"
                                                class="form-control 
                                        @error('penerbit')
                                            is-invalid
                                        @enderror">
                                            @error('penerbit')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="_dm-inputAddress" class="form-label">Tahun Terbit</label>
                                            <input id="_dm-inputAddress" name="tahun_terbit"
                                                placeholder="Masukan tahun_terbit" onkeydown="preventNegativeInput(event)"
                                                value="{{ $buku->tahun_terbit }}"
                                                class="form-control 
                                            @error('tahun_terbit')
                                                is-invalid
                                            @enderror">
                                            @error('tahun_terbit')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="_dm-inputAddress" class="form-label">No ISBN</label>
                                            <input id="_dm-inputAddress" name="no_isbn" disabled placeholder="Masukan no isbn"
                                                onkeydown="preventNegativeInput(event)" value="{{ $buku->no_isbn }}"
                                                class="form-control 
                                            @error('no_isbn')
                                                is-invalid
                                            @enderror">
                                            @error('no_isbn')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="_dm-inputAddress" class="form-label">Jumlah Halaman</label>
                                            <input id="_dm-inputAddress" name="jumlah_halaman"
                                                placeholder="Masukan jumlah halaman"
                                                onkeydown="preventNegativeInput(event)"
                                                value="{{ $buku->jumlah_halaman }}"
                                                class="form-control 
                                            @error('jumlah_halaman')
                                                is-invalid
                                            @enderror">
                                            @error('jumlah_halaman')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2">
                                            <label for="_dm-inputAddress" class="form-label">URL PDF</label>
                                            <input id="_dm-inputAddress" type="file" name="url_pdf" value="{{ $buku->url_pdf }}" placeholder="Masukan url pdf"  accept="application/pdf"
                                                class="form-control 
                                        @error('url_pdf')
                                            is-invalid
                                        @enderror">
                                            @error('url_pdf')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mt-2 mt-2">
                                            <label for="_dm-inputAddress" class=" ">Deskripsi</label>
                                            <textarea name="deskripsi" id="_dm-inputAddress" cols="5" rows="5"
                                                class="form-control">{{ $buku->deskripsi }}</textarea>
                                        </div>

                                        <div class="row mt-3 ">
                                            <div class="col-md-6 col-sm-12 mb-2 d-grid ">
                                                <a href="{{ route('buku.index') }}" class="btn btn-primary">Batal</a>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mb-2 d-grid">
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </div>
                                </form>
                                <!-- END : Block styled form -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function updatePreview(input, target) {
            let file = input.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function() {
                let img = document.getElementById(target);
                // can also use "this.result"
                img.src = reader.result;
            }
        }

        function updateMultiPreview(inputId, targetContainer) {
            let input = document.getElementById(inputId);
            let images = input.files;
            let previewContainer = document.getElementById(targetContainer);
            previewContainer.innerHTML = ''; // Clear existing preview

            for (let i = 0; i < images.length; i++) {
                let reader = new FileReader();
                reader.readAsDataURL(images[i]);

                reader.onload = function() {
                    let imgContainer = document.createElement('div');
                    imgContainer.classList.add('d-flex', 'flex', 'align-middle', 'position-relative',
                        'mb-3'); // Add position relative class and margin bottom

                    let imgElement = document.createElement('img');
                    imgElement.src = reader.result;
                    imgElement.style.width = '70px'; // 

                    let fileName = document.createElement('p');
                    fileName.innerText = images[i].name; // Display file name

                    let cancelButton = document.createElement('button');
                    cancelButton.innerText = 'Cancel';
                    cancelButton.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0',
                        'end-0'); // Add Bootstrap classes
                    cancelButton.addEventListener('click', function() {
                        previewContainer.removeChild(imgContainer); // Remove the image container
                    });

                    imgContainer.appendChild(imgElement);
                    imgContainer.appendChild(fileName);
                    imgContainer.appendChild(cancelButton);
                    previewContainer.appendChild(imgContainer);
                }
            }
        }

        
    </script>
    <script>
        function preventNegativeInput(event) {
            if (event.key === "-" || event.key === "e" || event.key === "E") {
                event.preventDefault();
            }
        }
    </script>
    <script>
        /*
                                                            We want to preview images, so we need to register the Image Preview plugin
                                                            */
        FilePond.registerPlugin(

            // encodes the file as base64 data
            FilePondPluginFileEncode,

            // validates the size of the file
            FilePondPluginFileValidateSize,

            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

            // previews dropped images
            FilePondPluginImagePreview
        );

        // Select the file input and use create() to turn it into a pond
        FilePond.create(
            document.querySelector('input')
        );
    </script>
@endsection
