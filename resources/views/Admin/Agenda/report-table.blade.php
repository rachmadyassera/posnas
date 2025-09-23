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
        @if (Auth::user()->getRoleNames()->first() != 'admin')
            <h6> Oleh {{ Auth::user()->name }} ({{ Auth::user()->profil->jabatan }}) </h6>
        @endif
    </center>
    <center>
        <h5> {{ $subTitle }} </h5>
    </center>
    <center>
        <h5>Total {{ $activity->flatten()->count() }} Kegiatan</h5>
    </center>
    <br>

    <table style="border-width: 1px; border-color: #000;" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Waktu</th>
                <th>Nama Kegiatan </th>
            </tr>
        </thead>

        <tbody>

            @foreach ($activity as $date => $items)
                <tr>
                    <td style="vertical-align: top; border-width: 1px; border-color: #000;">
                        {{ $loop->iteration }}</td>
                    <td colspan="2" style="vertical-align: top; border-width: 1px; border-color: #000;">
                        {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }} ({{ $items->count() }})
                    </td>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td style="vertical-align: top; border-width: 1px; border-color: #000;"> K{{ $loop->iteration }}
                        </td>
                        <td style="vertical-align: top; border-width: 1px; border-color: #000;">
                            {{ $carbon::parse($item->date_activity)->isoFormat('hh:mm A') }}
                            ({{ ucfirst($item->status_activity) }})
                        </td>
                        <td style="vertical-align: top; border-width: 1px; border-color: #000;">
                            {{ $item->name_activity }},
                            @if ($item->is_private == 'true')
                                <b>(Private)</b>
                            @endif
                            <br>
                            Di {{ $item->location }}
                        </td>
                    </tr>
                    <tr>
                        <th style="vertical-align: top; border-width: 1px; border-color: #000;"></th>
                        <th style="vertical-align: top; border-width: 1px; border-color: #000; "
                            class="bg-secondary text-white">Pelapor ({{ $item->notesactivity->count() }})</th>
                        <th style="vertical-align: top; border-width: 1px; border-color: #000; "
                            class="bg-secondary text-white">Catatan </th>
                    </tr>
                    @foreach ($item->notesactivity as $note)
                        <tr>
                            <td style="vertical-align: top; border-width: 1px; border-color: #000;"></td>
                            <td style="vertical-align: top; border-width: 1px; border-color: #000;">
                                {{ $note->user->name }}</td>
                            <td style="vertical-align: top; border-width: 1px; border-color: #000;">{{ $note->notes }}
                                ({{ \Carbon\Carbon::parse($note->created_at)->translatedFormat('d F Y') }})
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="vertical-align: top; border-width: 1px; border-color: #000;"> </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>

    </table>

    <footer class="text-right">
        <p class="pr-3 m-0 mb-2">
            Printed Date : {{ date('Y-m-d h:i A') }} <br>
            Daftar laporan kegiatan ini secara otomatis dibuat dari layanan elektronik pendukung administrasi
            sekretariat (LEPAT) Pemerintah Kota Tanjungbalai
        </p>

    </footer>
</body>

</html>
