<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <td style="vertical-align: middle; " rowspan="3" style="width:150px">
                    <div class="text-left">
                        <img style="width: 120%" src="{{ public_path('logo/logo-pemko.png') }}" alt="">
                    </div>
                </td>
                <td style="vertical-align: middle; " class="text-center">
                    <h4>Pemerintah Kota Tanjungbalai</h4>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle; " class="text-center">
                    <h3>Sistem Informasi Absensi Kehadiran Rapat</h3>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle; " class="text-center">
                    <h6>Dikelola oleh Dinas Komunikasi dan Informatika bidang Aptika</h6>
                </td>
            </tr>
        </thead>
    </table>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <h4>
        <center>Data Seluruh Rapat pada SIAKRA</center>
    </h4>

    @inject('carbon', 'Carbon\Carbon')
    <table id="datatables" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td style="width: 130px">Judul</td>
                <td style="width: 170px">Dilaksanakan </td>
                <td>Keterangan </td>
                <td>Jumlah Hadir </td>
            </tr>
        </thead>
        <tbody>

            @foreach ($rapat as $rpt)
                <tr>
                    <td style="vertical-align: top; ">{{ $loop->iteration }}</td>
                    <td style="vertical-align: top; ">{{ $rpt->judul }}</td>
                    <td style="vertical-align: top; ">{{ $carbon::parse($rpt->tanggal)->isoFormat('dddd, D MMMM Y') }} ,
                        <br>
                        Lokasi : <br> {{ $rpt->location->nama }}, <br>
                        {{ $rpt->location->alamat }}
                    </td>
                    <td style="vertical-align: top; ">{{ $rpt->keterangan }}</td>
                    <td style="vertical-align: top; ">{{ $rpt->participant->where('status', 'enable')->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
