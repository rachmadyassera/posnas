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

    <center>
        <h4> {{ $title }}</h4>
    </center>
    <center>
        <h5> {{ $subTitle }}</h5>
    </center>
    <center>
        <h5>Total {{ $activity->count() }} Kegiatan</h5>
    </center>
    <br>

    <table style="border-width: 1px; border-color: #000;" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Kegiatan </th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Pendamping </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($activity as $act)
                <tr>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $loop->iteration }}</td>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $carbon::parse($act->date_activity)->isoFormat('dddd, D MMMM Y hh:mm A') }}</td>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $act->name_activity }}
                        @if ($act->is_private == 'true')
                            <b>(Private)</b>
                        @endif
                    </td>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $act->location }}</td>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $act->description }}</td>
                    <td style="vertical-align: top; border-width: 1px;
                    border-color: #000;">
                        {{ $act->accompanying_officer }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <footer class="text-right">
        <p class="pr-3 m-0 mb-2">
            Printed Date : {{ date('Y-m-d h:i A') }} <br>
            Daftar laporan kegiatan ini secara otomatis dibuat dari layanan elektronik pendukung administrasi
            kesekretariatan (LEPAT) Pemerintah Kota Tanjungbalai
        </p>

    </footer>
</body>

</html>
