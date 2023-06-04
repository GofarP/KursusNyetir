<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>

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

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-3">Silahkan Pilih Daftar Peserta Untuk <br>
                        Diikutkan Dalam Kursus</h4>

                    <div class="table-responsive mt-3">

                        <table class="table mt-5" id="table_data_peserta">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telpon</th>
                                    <th>Tempat-Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                               @foreach ($peserta as $peserta )
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$peserta->nama}}</td>
                                        <td>{{$peserta->jenis_kelamin}}</td>
                                        <td>{{$peserta->notelp}}</td>
                                        <td>{{$peserta->tempat_lahir}}, {{$peserta->tanggal_lahir}}</td>
                                        <td>{{$peserta->alamat}}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('tambahKursus',$peserta)}}">
                                                <i class="bi bi-plus"></i>
                                                Tambah Peserta
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <h3 class="mt-3">Data Kursus</h3>

                    <div class="table-responsive mt-3">

                        <table class="table mt-5" id="table_data_kursus">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Nama Pelatih</th>
                                    <th>Nama Mobil</th>
                                    <th>Jenis Mobil</th>
                                    <th>Jenis Paket</th>
                                    <th>Mulai Tanggal</th>
                                    <th>Selesai Tanggal</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                               @foreach ($data_kursus as $kursus)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$kursus->nama_peserta}}</td>
                                        <td>{{$kursus->nama_pelatih}}</td>
                                        <td>{{$kursus->nama_mobil}}</td>
                                        <td>{{$kursus->jenis_mobil}}</td>
                                        <td>{{$kursus->nama_paket}}</td>
                                        <td>{{$kursus->mulai_tanggal}}</td>
                                        <td>{{$kursus->selesai_tanggal}}</td>
                                        <td>{{$kursus->status}}</td>
                                        <td>{{$kursus->total}}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{route('kursus.edit',$kursus)}}">
                                                <i class="bi bi-pencil"></i>
                                                 Edit
                                            </a>
                                            <br>
                                            <form action="{{route('kursus.destroy',$kursus)}}" method="POST"
                                                class="d-inline" id="form-delete-kelas">
                                                @csrf
                                                @method("DELETE")
                                                <button  class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Mobil Ini?')"  name="btn-hapus" id="btn-hapus"><i class="bi bi-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                 $('#table_data_peserta').DataTable();
                 $('#table_data_kursus').DataTable();
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
