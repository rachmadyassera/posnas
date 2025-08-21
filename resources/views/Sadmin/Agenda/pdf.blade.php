<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
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
    </style>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @inject('carbon', 'Carbon\Carbon')
    <header>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <td style="vertical-align: middle; " rowspan="2" style="width:150px">
                        <div class="text-left">
                            <img style="width: 120%" src="{{ public_path('logo/logo-pemko.png') }}" alt="">
                        </div>
                    </td>
                    <td style="vertical-align: middle; " class="text-center">
                        <h4>PEMERINTAH KOTA TANJUNGBALAI</h4>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; " class="text-center">
                        <h4>{{ $title }}</h4>
                    </td>
                </tr>
            </thead>
        </table>
    </header>

    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <center>
        <h4> {{ $subTitle }}</h4>
    </center>
    <center>
        <h5>Total {{ $activity->count() }} Kegiatan</h5>
    </center>
    <br>
    @foreach ($activity as $act)
        <table>
            <thead>
                <tr>
                    <td style="vertical-align: top; width: 200px;" class="text-left"> No </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left"> {{ $loop->iteration }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 200px;" class="text-left"> Nama Kegiatan </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left"> {{ $act->name_activity }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 200px; " class="text-left"> Tanggal </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left">
                        {{ $carbon::parse($act->date_activity)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 200px; " class="text-left"> Lokasi </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left"> {{ $act->location }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 200px;" class="text-left"> Keterangan </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left"> {{ $act->description }}</td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px;" class="text-left"> Petugas Pendamping </td>
                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                    <td style="vertical-align: top; " class="text-left"> {{ $act->accompanying_officer }}</td>
                </tr>
            </thead>
        </table>
        <br>

        <center>
            <h4> Catatan Laporan Evaluasi Kegiatan </h4>
        </center>
        @foreach ($act->notesactivity as $note)
            <table style="border-width: 1px; border-color: #000;" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Petugas </th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="vertical-align: top; border-width: 1px;
                border-color: #000;">
                            {{ $note->user->name }}</td>
                        <td style="vertical-align: top; border-width: 1px;
                border-color: #000;">
                            {{ $note->notes }}</td>
                        <td style="vertical-align: top; border-width: 1px;
                border-color: #000;">
                            {{ $note->created_at }}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; border-width: 1px;
                    border-color: #000;"
                            align="center" colspan="3">
                            <center> DOKUMENTASI </center><br>
                            @foreach ($note->documentation as $doc)
                                <img style="width: 40%" src="{{ public_path('images/') }}{{ $doc->picture }}"
                                    alt="">
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>
        @endforeach
        @if ($loop->iteration != $activity->count())
            <div class="page-break"></div>
        @endif
    @endforeach

    <footer class="text-right">
        <p class="pr-3 m-0 mb-2">
            Printed Date : {{ date('Y-m-d h:i A') }} <br>
            Daftar laporan kegiatan inisecara otomatis dibuat dari layanan elektronik pendukung administrasi
            kesekretariatan (LEPAT) Pemerintah Kota Tanjungbalai
        </p>

    </footer>
</body>

</html>
