<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatih</title>

    <link rel="stylesheet" href="{{url('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/main/app-dark.css')}}">

    <link rel="shortcut icon" href="{{url('assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{url('assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{url('assets/css/shared/iconly.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{url('assets/extensions/sweetalert2/sweetalert2.min.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</head>
<body>

    @extends('partials.sidebar.sidebar')
    @extends('partials.main.main')


    @section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="mt-3">Tambah Pelatih</h3>

            <form method="post" action="{{route('pelatih.update',$pelatih->id_pelatih)}}" class="mb-5"  enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label for="nama" class="mt-3 mb-2">Nama Pelatih:</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Pelatih"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama',$pelatih->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="jenis_kelamin" class="mt-3 mb-2">Jenis Kelamin:</label>
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="Pria" {{$pelatih->jenis_kelamin == "Pria" ? 'selected' : ''}}>Pria</option>
                        <option value="Wanita" {{$pelatih->jenis_kelamin == "Wanita" ? 'selected' : ''}}>Wanita</option>
                    </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="mt-3 mb-2">Alamat:</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat Pelatih"
                        class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat',$pelatih->alamat) }}">
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="notelp" class="mt-3 mb-2">No Telp:</label>
                    <input type="text" name="notelp" placeholder="Masukkan NoTelp Pelatih"
                        class="form-control @error('notelp') is-invalid @enderror" value="{{ old('notelp',$pelatih->notelp) }}">
                        @error('notelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="mt-3 mb-2">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir Pelatih"
                        class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir',$pelatih->tempat_lahir) }}">
                        @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="mt-3 mb-2">Tanggal Lahir:</label>
                    <div class="input-group date" id="datepicker">
                        <div class="input-group date" id="datepicker">

                        </div>
                        <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                         value="{{old('tanggal_lahir', $pelatih->tanggal_lahir)}}" placeholder="Tanggal-Bulan-Tahun" readOnly="true">
                            <span class="input-group-append">
                                <span class="input-group-text text-white bg-success d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label for="foto" class="mt-3">Foto Pelatih:</label>
                    <input type="file" name="foto" id="foto"
                        class="form-control-file @error('foto') is-invalid @enderror" onchange="previewImage()">

                        <br>
                    @if($pelatih->foto)
                        <img src="{{ asset('storage/' . $pelatih->foto) }}"
                        class="img-preview img-fluid mt-3 mb-3 col-sm-5 " style="width:25%;height:25%">
                    @else
                        <img class="img-preview img-fluid mt-3 mb-3 col-sm-5" style="width:25%;height:25%">
                    @endif

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary mt-3" value="Edit Pelatih" style="border-radius:100px">
                </div>

            </form>
        </div>
    </div>

    @endsection

    <script>

            $(function() {
                $('#datepicker').datepicker({
                    format: 'dd-mm-yyyy'
                });
            });

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
