<!DOCTYPE html>
<html>
<head>
	<title>Laporan Paket CV.Sumber Rezeki</title>


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
        <h2 style=" text-align:center; ">Laporan Jenis Paket</h2>
        <h4 style="text-align:center">Jl. Ir.Sutami No.5A/Tanjakkan Perla Telp. (0771) 27579 Tanjungpinang</h4>

        <table class='center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Paket</th>
                    <th>Nama</th>
                    <th>Sim</th>
                    <th>Harga</th>
                    <th>Pertemuan</th>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($paket as $paket)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$paket->id_paket}}</td>
                    <td>{{$paket->nama}}</td>
                    <td>{{$paket->sim}}</td>
                    <td>{{$paket->harga}}</td>
                    <td>{{$paket->pertemuan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
