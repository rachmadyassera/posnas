
<!DOCTYPE html>
<html>
<head>
    <title>{{ $rapat->judul }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $rapat->judul }}</h1>
    <p>{{ $rapat->tanggal }}</p>
    <p>{{ $rapat->keterangan }}</p>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Instansi</th>
            <th>No HP</th>
            <th>Tandatangan</th>
        </tr>
        @foreach($peserta as $pst)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pst->nama }}</td>
            <td>{{ $pst->instansi }}</td>
            <td>{{ $pst->nohp }}</td>
            <td><center><img  style="width: 50%" src="{{ asset('upload/'.$pst->tandatangan) }}" alt=""></center></td>
        </tr>
        @endforeach
    </table>

</body>
</html>
