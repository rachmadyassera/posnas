@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data seluruh lokasi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Name Location</td>
                                <td>Address </td>
                                <td>Description </td>
                                <td>Status </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lokasi as $lks )
                            <tr>
                                <td style="vertical-align: middle; ">{{$lks->nama}}</td>
                                <td style="vertical-align: middle; ">{{$lks->alamat}}</td>
                                <td style="vertical-align: middle; ">Didaftarkan oleh : <br> {{$lks->user->name}}, <br> {{$lks->user->profil->opd->nama}} </td>
                                <td style="vertical-align: middle; ">
                                    @if ($lks->status =='enable')
                                    <div class="badge badge-success">Enable</div>
                                    @else
                                    <div class="badge badge-danger">Disable</div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle;" class="text-center">
                                    <a href="/location/disable/{{$lks->id}}" class="btn-sm btn-warning" onclick="confirmation(event)"><i class="fa fa-recycle"></i> </a>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    {{-- Table jika menggunakan serverside --}}
                    {{-- <table id="datatables" class="table table-hover ">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Role</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                    </table> --}}
                </div>
            </div>
        </div>
</div>

@endsection
