<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>

    <link rel="stylesheet" href="{{url('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/main/app-dark.css')}}">

    <link rel="shortcut icon" href="{{url('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{url('assets/css/shared/iconly.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{url('assets/extensions/sweetalert2/sweetalert2.min.css')}}">

</head>
<body>
    @extends('partials.sidebar.sidebar')
    @extends('partials.main.main')


    @section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="mt-3">Tambah Mobil</h3>

            <form method="post" action="{{route('mobil.store')}}" class="mb-5"  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="mt-3 mb-2">Nama Mobil:</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Mobil"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_polisi" class="mt-3 mb-2">No Polisi:</label>
                    <input type="text" name="no_polisi" placeholder="Masukkan Nomor Polisi Mobil"
                        class="form-control @error('no_polisi') is-invalid @enderror" value="{{ old('no_polisi') }}">
                        @error('no_polisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="warna" class="mt-3 mb-2">Warna Mobil:</label>
                    <input type="text" name="warna" placeholder="Masukkan Warna Mobil"
                        class="form-control @error('warna') is-invalid @enderror" value="{{ old('warna') }}">
                        @error('warna')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="merk" class="mt-3 mb-2">Merk Mobil:</label>
                    <input type="text" name="merk" placeholder="Masukkan Merk Mobil"
                        class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk') }}">
                        @error('merk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jenis" class="mt-3 mb-2">Jenis Mobil:</label>
                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                        <option value="Manual">Manual</option>
                        <option value="Matic">Matic</option>
                    </select>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="mt-3">Foto Mobil:</label>
                    <input type="file" name="foto" id="foto"
                        class="form-control-file @error('foto') is-invalid @enderror" onchange="previewImage()">
                    <img class="img-preview img-fluid mt-3 mb-3 col-sm-5" style="width:25%;height:25%">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary mt-3" value="Tambah Mobil" style="border-radius:100px">
                </div>

            </form>
        </div>
    </div>

    @endsection

    <script>
        function previewImage()
            {
                    const image = document.querySelector('#foto');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = "block";

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
            }

    </script>


</body>
</html>
