@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="col-lg-6 col-md-6 col-12 col-sm-6">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h4>Kegiatan di waktu yang sama</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><b>Data Kegiatan</b></td>
                                    <td><b>Keterangan</b></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($arround_act as $ar_act)
                                    <tr>
                                        <td style="vertical-align: middle; "> {{ $ar_act->name_activity }}<br><br>
                                            <b>Tanggal : </b><br>
                                            {{ $ar_act->date_activity }}
                                            @if ($ar_act->is_private == 'true')
                                                <br>
                                                <div class="badge badge-danger">Private</div>
                                            @endif
                                            <br>
                                            <b>Lokasi :</b><br>
                                            {{ $ar_act->location }}
                                        </td>
                                        <td style="vertical-align: top; ">{{ $ar_act->description }}<br><br>
                                            <b>Pendamping :</b><br>
                                            {{ $ar_act->accompanying_officer }}
                                            <br>
                                            <b>Author : </b>{{ $ar_act->user->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
