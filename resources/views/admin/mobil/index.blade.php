<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>

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
                    <h3 class="mt-3">Daftar Mobil</h3>

                    <div class="d-flex  justify-content-end">
                        <div>
                            <a href="{{route('mobil.create')}}" class="btn btn-success mt-3"><i class="bi bi-plus-circle"></i> Tambah Mobil</a>
                        </div>
                    </div>

                    <div class="table-responsive mt-3">

                        <table class="table mt-5" id="table_data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mobil</th>
                                    <th>Merk</th>
                                    <th>Warna</th>
                                    <th>Jenis</th>
                                    <th>No Polisi</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach ($mobil as $mobil)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$mobil->nama}}</td>
                                    <td>{{$mobil->merk}}</td>
                                    <td>{{$mobil->warna}}</td>
                                    <td>{{$mobil->jenis}}</td>
                                    <td>{{$mobil->no_polisi}}</td>
                                    <td>
                                        <img class="img-preview img-fluid mt-3 mb-3 col-sm-5" src="{{ asset('storage/' . $mobil->foto) }}" style="width:50%;height:50%">

                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('mobil.edit',$mobil)}}">
                                            <i class="bi bi-pencil"></i>
                                             Edit
                                        </a>
                                        <form action="{{route('mobil.destroy',$mobil)}}" method="POST"
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


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-preview img-fluid mt-3 mb-3 col-sm-5" style="width:25%;height:25%">
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
