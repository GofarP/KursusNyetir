<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mobil CV.Sumber Rezeki</title>


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
        <h2 style=" text-align:center; ">Laporan Mobil</h2>
        <h4 style="text-align:center">Jl. Ir.Sutami No.5A/Tanjakkan Perla Telp. (0771) 27579 Tanjungpinang</h4>

        <table class='center'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Mobil</th>
                    <th>Nama</th>
                    <th>Warna</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>No Polisi</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($mobil as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->id_mobil}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->warna}}</td>
                    <td>{{$p->jenis}}</td>
                    <td>{{$p->merk}}</td>
                    <td>{{$p->no_polisi}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
