<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pelatih CV.Sumber Rezeki</title>


    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
       table.center {
            width:80%;
            margin-left: auto;
            margin-right: auto;
        }
      </style>

</head>
<body>
        <h1 style="text-align:center">Sumber Rezeki</h1>
        <h2 style=" text-align:center; ">Laporan Pelatih</h2>
        <h4 style="text-align:center">Jl. Ir.Sutami No.5A/Tanjakkan Perla Telp. (0771) 27579 Tanjungpinang</h4>

        <table class='center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id pelatih</th>
                    <th>Nama</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($pelatih as $pelatih)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$pelatih->id_pelatih}}</td>
                    <td>{{$pelatih->nama}}</td>
                    <td>{{$pelatih->tempat_lahir}}, {{$pelatih->tgl_lahir}}</td>
                    <td>{{$pelatih->jenis_kelamin}}</td>
                    <td>{{$pelatih->no_telp}}</td>
                    <td>{{$pelatih->alamat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
