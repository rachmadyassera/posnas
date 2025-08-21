<!DOCTYPE html>
<html>

<head>
    <title>{{ $rapat->judul }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @page {
            size: legal potrait;
        }

        header {
            width: 100%;
            position: fixed: display: block;

        }

        footer {
            width: 100%;
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 100px;
            color: #000;
            text-align: center;
            line-height: 35px;
            border-top: 1px solid #000;
            font-size: 12px;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    @inject('carbon', 'Carbon\Carbon')
    <header>
        <table cellpadding="0" cellspacing="0" class="center">
            <thead>
                <tr>
                    <td style="vertical-align: middle; " rowspan="3" style="width:150px">
                        <div class="text-left">
                            <img style="width: 170px" src="{{ public_path('logo/logo-pemko.png') }}" alt="">
                        </div>
                    </td>
                    <td style="vertical-align: middle; " class="text-center">
                        <h4>PEMERINTAH KOTA TANJUNGBALAI</h4>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; " class="text-center">
                        <h3>{{ $rapat->organization->name }}</h3>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; " class="text-center">
                        <h6>LAYANAN ELEKTRONIK PENDUKUNG ADMINISTRASI SEKRETARIAT</h6>
                    </td>
                </tr>
            </thead>
        </table>
    </header>

    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <h4>
        <center>Daftar Hadir Peserta</center>
    </h4>
    <table>
        <thead>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Kegiatan </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $rapat->title }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px; " class="text-left"> Tanggal </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left">
                    {{ $carbon::parse($rapat->date_confrence)->isoFormat('dddd, D MMMM Y, HH:mm') }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px; " class="text-left"> Lokasi </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $rapat->location->name }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Keterangan </td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $rapat->description }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top; width: 100px;" class="text-left"> Jumlah Hadir</td>
                <td style="vertical-align: top; " class="text-center"> : </td>
                <td style="vertical-align: top; " class="text-left"> {{ $peserta->count() }} Peserta (Laki-laki :
                    {{ $peserta->where('gender', 'Laki-laki')->count() }}, Perempuan :
                    {{ $peserta->where('gender', 'Perempuan')->count() }})</td>
            </tr>
        </thead>
    </table>
    <br>

    <div class="table-responsive">
        <table style="border-width: 1px;
    border-color: #000;" class="table table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th style="width: 150px">Nama</th>
                    <th style="width: 150px">Jabatan</th>
                    <th style="width: 150px">NIP / NRP / ID</th>
                    <th style="width: 150px">Instansi</th>
                    <th>No HP</th>
                    <th style="width: 150px">
                        <center>Tandatangan</center>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($peserta as $pst)
                    <tr>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $loop->iteration }}</td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $pst->name }}
                            @if ($pst->gender == 'Laki-laki')
                                (L)
                            @else
                                (P)
                            @endif
                        </td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $pst->position }}</td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $pst->id_employee }}</td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $pst->organization }}</td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            {{ $pst->nohp }}</td>
                        <td style="vertical-align: middle; border-width: 1px;
            border-color: #000;">
                            <center>
                                <img style="width: 75%"
                                    src="{{ public_path('presensi/signature/' . $pst->signature) }}" alt="">
                            </center>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="text-right">
        <p class="pr-3 m-0 mb-2">
            Printed Date : {{ date('Y-m-d h:i A') }} <br>
            Daftar kehadiran ini secara otomatis dibuat dari layanan elektronik pendukung administrasi
            kesekretariatan (LEPAT) Pemerintah Kota Tanjungbalai
        </p>

    </footer>
</body>

</html>
