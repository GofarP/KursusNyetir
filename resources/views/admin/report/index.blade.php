<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket</title>

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


        <div class="container mt-5">

                <h3 class="mt-3">Laporan CV.Sumber Rezeki</h3>



                <div class="card">
                    <div class="card-body">

                            <h4 class="mt-3 mb-3">Laporan Mobil</h4>

                        <form method="POST" action="{{route('reportMobil')}}">
                            @csrf
                            <div class="mt-3">
                                <label for="jenislaporanmobil">Laporan Berdasarkan:</label>
                                <select class="form-select @error('jenis') is-invalid @enderror" name="jenislaporanmobil" id="jenislaporanmobil">
                                    <option value="Semua">Semua Laporan</option>
                                    <option value="Nama">Berdasarkan Nama</option>
                                    <option value="Id">Berdasarkan Id</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kriteria_mobil" class="mt-3 mb-2">Kriteria:</label>
                                <input type="text" name="kriteria_mobil" placeholder="Masukkan Kriteria"
                                    class="form-control @error('kriteria_mobil') is-invalid @enderror" value="{{ old('kriteria_mobil') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <Button class="btn btn-primary form-control">Cetak Laporan</Button>

                        </form>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                            <h4 class="mt-3 mb-3">Laporan Pelatih</h4>

                        <form method="POST" action="{{route('reportPelatih')}}">
                            @csrf
                            <div class="mt-3">
                                <label for="jenislaporanpelatih">Laporan Berdasarkan:</label>
                                <select class="form-select @error('jenislaporanpelatih') is-invalid @enderror"
                                name="jenislaporanpelatih" id="jenislaporanpelatih">
                                    <option value="Semua">Semua Laporan</option>
                                    <option value="Nama">Berdasarkan Nama</option>
                                    <option value="Id">Berdasarkan Id</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kriteria_pelatih" class="mt-3 mb-2">Pelatih:</label>
                                <input type="text" name="kriteria_peltih" placeholder="Masukkan Kriteria"
                                    class="form-control @error('kriteria_pelatih') is-invalid @enderror" value="{{ old('kriteria_pelatih') }}">
                                    @error('kriteria_pelatih')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="form-control btn btn-primary">Cetak Laporan</button>
                        </form>

                        </div>
                </div>

                <div class="card">
                        <div class="card-body">

                                <h4 class="mt-3 mb-3">Laporan Peserta</h4>

                            <form method="POST" action="{{route('reportPeserta')}}">

                                <div class="mt-3">
                                    <label for="jenislaporanpeserta">Laporan Berdasarkan:</label>
                                    <select class="form-select @error('jenislaporanpeserta') is-invalid @enderror" name="jenislaporanpeserta" id="jenislaporanpeserta">
                                        <option value="Semua">Semua Laporan</option>
                                        <option value="Nama">Berdasarkan Nama</option>
                                        <option value="Id">Berdasarkan Id</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="kriteria_peserta" class="mt-3 mb-2">Kriteria:</label>
                                    <input type="text" name="kriteria_mobil" placeholder="Masukkan Kriteria"
                                        class="form-control @error('kriteria_mobil') is-invalid @enderror" value="{{ old('kriteria_mobil') }}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button class="form-control btn btn-primary">Cetak Laporan</button>

                            </form>

                    </div>

                </div>



                <div class="card">

                    <div class="card-body">
                        <h4 class="mt-3 mb-3">Laporan Kursus</h4>

                        <form method="POST" action="{{route('reportKursus')}}">
                            @csrf
                            <div class="mt-3">
                                <label for="jenislaporankursus">Laporan Berdasarkan:</label>
                                <select class="form-select @error('jenislaporankursus') is-invalid @enderror" name="jenislaporankursus" id="jenislaporankursus">
                                    <option value="Semua">Semua Laporan</option>
                                    <option value="Mobil">Berdasarkan Nama Mobil</option>
                                    <option value="Paket">Berdasarkan Paket Kursus</option>
                                    <option value="Pelatih">Berdasarkan Nama Pelatih</option>
                                    <option value="Peserta">Berdasarkan Nama Peserta</option>
                                    <option value="Id">Berdasarkan Id</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kriteria_kursus" class="mt-3 mb-2">Kriteria:</label>
                                <input type="text" name="kriteria_kursus" placeholder="Masukkan Kriteria"
                                    class="form-control @error('kriteria_kursus') is-invalid @enderror" value="{{ old('kriteria_kursus') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <Button class="btn btn-primary form-control">Cetak Laporan</Button>

                        </form>

                    </div>

                </div>






        </div>

    @endsection

    <script src="{{url('assets/js/bootstrap.js')}}"></script>
    <script src="{{url('assets/js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{url('assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{url('assets/js/pages/sweetalert2.js')}}"></script>


    <script>

        $(document).ready(function () {
                 $('#table_data').DataTable();
        });

        $(function(){

            @if(Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Operasi Sukses',
                text: '{{ Session::get("success") }}'
            })

            @elseif(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Operasi Gagal',
                text: '{{ Session::get("error") }}'
            })

            @endif
        });
    </script>

</body>
</html>
