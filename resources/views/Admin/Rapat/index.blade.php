@extends('layouts.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data seluruh rapat </h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('confrence.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Rapat baru</a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td style="width: 130px">Judul</td>
                                <td style="width: 170px">Dilaksanakan </td>
                                <td>Keterangan </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rapat as $rpt )
                            <tr>
                                <td style="vertical-align: top; ">{{$loop->iteration}}</td>
                                <td style="vertical-align: top; ">{{$rpt->judul}}</td>
                                <td style="vertical-align: top; ">{{ $carbon::parse($rpt->tanggal)->isoFormat('dddd, D MMMM Y') }} , <br>
                                    Lokasi : <br> {{$rpt->location->nama}}, <br>
                                    {{$rpt->location->alamat}}
                                </td>
                                <td style="vertical-align: top; ">{{$rpt->keterangan}}</td>
                                <td style="vertical-align: top;" class="text-center">
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item has-icon" href="{{route ('confrence.edit', $rpt->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="dropdown-item has-icon" href="{{route ('confrence.generatepdf-qrcode', $rpt->id)}}"><i class="fa fa-qrcode"></i>Qr Code</a>
                                                <a class="dropdown-item has-icon" href="{{route ('confrence.show', $rpt->id)}}"><i class="fa fa-address-book"></i> Data Peserta</a>
                                                <a class="dropdown-item has-icon" href="{{route ('presence.confrence', $rpt->id)}}" target="_blank"><i class="fa fa-pen-nib"></i>Form Kehadiran</a>
                                                <a class="dropdown-item has-icon" href="/confrence/disable/{{$rpt->id}}" onclick="confirmation_destroy(event)"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
