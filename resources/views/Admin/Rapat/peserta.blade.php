@extends('layouts.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')

<div class="col-12 mb-4">
    <div class="hero bg-info text-white shadow">
      <div class="hero-inner">
        <h2>{{ $rapat->judul }}</h2>
        <p class="lead">{{ $carbon::parse($rapat->tanggal)->isoFormat('dddd, D MMMM Y') }} <br>{{ $rapat->location->nama }}</p>
        <p class="lead"><h5>Jumlah Kehadiran : {{ $peserta->count() }} Peserta</h5></p>
      </div>
    </div>
</div>
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data kehadiran peserta </h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('confrence.generatepdf', $rapat->id)}}"  class="btn btn-icon btn-success"><i class="fas fa-file-pdf"></i> Generate PDF</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td style="width: 20px">No </td>
                                <td style="width: 200px">Nama </td>
                                <td >Instansi </td>
                                <td>No HP </td>
                                <td style="width: 50px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($peserta as $pst )
                            <tr>
                                <td style="vertical-align: middle; ">{{$loop->iteration}}</td>
                                <td style="vertical-align: middle; ">{{$pst->nama}}</td>
                                <td style="vertical-align: middle; ">{{$pst->instansi}}</td>
                                <td style="vertical-align: middle; ">{{$pst->nohp}}</td>
                                <td style="vertical-align: middle;"  class="text-center">
                                        <a href="/confrence/disable-participant/{{$pst->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
