@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Data Lokasi Rapat</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <button class="btn btn-icon btn-success" id="MybtnModal"><i class="fas fa-plus-circle"></i> Lokasi</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nama Lokasi</td>
                                <td>Alamat </td>
                                <td>Keterangan </td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lokasi as $lks )
                            <tr>
                                <td style="vertical-align: middle; ">{{$lks->name}}</td>
                                <td style="vertical-align: middle; ">{{$lks->address}}</td>
                                <td style="vertical-align: middle; ">Didaftarkan oleh : <br> {{$lks->user->name}}, <br> {{$lks->user->profil->organization->name}} </td>
                                <td style="vertical-align: middle; ">
                                    @if ($lks->user_id == Auth::user()->id)
                                    <ul class="nav">
                                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalUpdate{{$lks->id}}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        &nbsp;
                                        <a href="/location/disable/{{$lks->id}}" class="btn btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                    </ul>
                                    @endif
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

@include('Admin.Lokasi.create-modal')
@include('Admin.Lokasi.edit-modal')

@endsection
