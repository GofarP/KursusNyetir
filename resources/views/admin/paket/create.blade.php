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
            <h3 class="mt-3">Tambah Paket</h3>

            <form method="post" action="{{route('paket.store')}}" class="mb-5"  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="mt-3 mb-2">Nama Paket:</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama Paket"
                        class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga" class="mt-3 mb-2">Harga:</label>
                    <input type="number" name="harga" placeholder="Masukkan Harga Paket"
                        class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pertemuan" class="mt-3 mb-2">Jumlah Pertemuan:</label>
                    <input type="number" name="pertemuan" placeholder="Masukkan Jumlah Pertemuan"
                        class="form-control @error('pertemuan') is-invalid @enderror" value="{{ old('pertemuan') }}">
                        @error('pertemuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sim" class="mt-3 mb-2">Dengan Sim:</label>
                    <select class="form-select @error('sim') is-invalid @enderror" name="sim" id="sim">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                        @error('sim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>


                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary mt-3" value="Tambah Paket" style="border-radius:100px">
                </div>

            </form>
        </div>
    </div>

    @endsection


</body>
</html>
