<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>

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
            <h3 class="mt-3">Edit Paket</h3>

            <form method="post" action="{{route('kursus.update',$kursus->id_kursus)}}" class="mb-5"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="mt-3">Nama Peserta:</label>
                    <br>
                    <label>{{$peserta}}</label>
                </div>

                <div class="mb-3">
                    <label for="id_pelatih" class="mt-3 mb-2">Pilih Pelatih:</label>
                    <select class="form-select @error('id_pelatih') is-invalid @enderror" name="id_pelatih" id="id_pelatih">
                        @foreach ($pelatih as $pelatih )
                            <option value={{$pelatih->id_pelatih}} {{$pelatih->id_pelatih == $pelatih->id_pelatih  ? 'selected' : ''}}>{{$pelatih->nama}}</option>
                        @endforeach
                    </select>
                        @error('id_pelatih')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="id_mobil" class="mt-3 mb-2">Pilih Mobil:</label>
                    <select class="form-select @error('id_mobil') is-invalid @enderror" name="id_mobil" id="id_mobil">
                        @foreach ($mobil as $mobil )
                            <option value={{$mobil->id_mobil}}>{{$mobil->nama}}</option>
                        @endforeach
                    </select>
                        @error('id_mobil')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_paket" class="mt-3 mb-2" >Pilih Paket:</label>
                    <select class="form-select @error('id_paket') is-invalid @enderror" name="id_paket"
                    onChange="update()" id="id_paket">
                        @foreach ($paket as $paket )
                            <option value={{$paket->id_paket}} data-harga="{{$paket->harga}}">{{$paket->nama}}</option>
                        @endforeach
                    </select>
                        @error('id_paket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="status" class="mt-3 mb-2">Status:</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="Berjalan">Berjalan</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                        @error('id_paket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="mt-3">Total Harga:</label>
                    <br>
                    <label id="total_harga"></label>
                </div>


                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-primary mt-3" value="Edit Paket" style="border-radius:100px">
                </div>

            </form>
        </div>
    </div>

    <script>


        var select = document.getElementById('id_paket');
        var option = select.options[select.selectedIndex];
        var totalHarga=parseInt(option.getAttribute('data-harga'));
        document.getElementById('total_harga').innerText = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(totalHarga);

        function update()
        {
            select = document.getElementById('id_paket');
            option = select.options[select.selectedIndex];
            totalHarga=parseInt(option.getAttribute('data-harga'));

            document.getElementById('total_harga').innerText = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(totalHarga);
        }

</script>

    @endsection

</body>
</html>
