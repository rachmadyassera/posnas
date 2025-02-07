@extends('layouts.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')

<div class="col-12 mb-4">
    <div class="hero bg-info text-white shadow">
      <div class="hero-inner">
        <h2>{{ $kegiatan->title }}</h2>
        <p class="lead">{{ $carbon::parse($kegiatan->date_confrence)->isoFormat('dddd, D MMMM Y') }} <br>{{ $kegiatan->location->nama }}</p>
        <p class="lead"><h5>Jumlah Kehadiran : {{ $presence->count() }} Peserta</h5></p>
        <p class="lead"><h5>Laki-laki : {{ $presence->where('gender','Laki-laki')->count() }}, Perempuan : {{ $presence->where('gender','Perempuan')->count() }}</h5></p>
      </div>
    </div>
</div>
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Kehadiran Kegiatan </h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('confrence.generatepdf', $kegiatan->id)}}"  class="btn btn-icon btn-success"><i class="fas fa-file-pdf"></i> Generate PDF</a>
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
                                <td>Nama </td>
                                <td>Jenis Kelamin </td>
                                <td>Jabatan </td>
                                <td>NIP / NRP / ID </td>
                                <td>Instansi </td>
                                <td>No HP </td>
                                <td style="width: 50px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($presence as $pre )
                            <tr>
                                <td style="vertical-align: middle; ">{{$loop->iteration}}</td>
                                <td style="vertical-align: middle; ">{{$pre->name}}</td>
                                <td style="vertical-align: middle; ">{{$pre->gender}}</td>
                                <td style="vertical-align: middle; ">{{$pre->position}}</td>
                                <td style="vertical-align: middle; ">{{$pre->id_employee}}</td>
                                <td style="vertical-align: middle; ">{{$pre->organization}}</td>
                                <td style="vertical-align: middle; ">{{$pre->nohp}}</td>
                                <td style="vertical-align: middle;"  class="text-center">
                                        <a href="/presence/disable/{{$pre->id}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
