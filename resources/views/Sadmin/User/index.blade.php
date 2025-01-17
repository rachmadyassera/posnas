@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data pengguna aplikasi</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('user.create')}}"  class="btn btn-icon btn-success"><i class="fas fa-plus-circle"></i> Pengguna</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nama</td>
                                <td>Role</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Data Profil</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datauser as $user )
                            <tr>
                                <td style="vertical-align: middle; ">{{$user->name}}</td>
                                <td style="vertical-align: middle; ">{{$user->role}}</td>
                                <td style="vertical-align: middle; ">{{$user->email}}</td>
                                <td style="vertical-align: middle; ">
                                    @if ($user->status =='enable')
                                    <div class="badge badge-success">Enable</div>
                                    @else
                                    <div class="badge badge-danger">Disable</div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle; ">
                                    NIP : {{$user->profil->nip}}<br>
                                    Jabatan : {{$user->profil->jabatan}}<br>
                                    Instansi : {{$user->profil->organization->name}}<br>
                                    No HP : {{$user->profil->nohp}}
                                </td>
                                <td style="vertical-align: middle; ">
                                    <ul class="nav">
                                        <a href="{{route ('user.edit', $user->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                                        <a href="{{route ('user.destroy', $user->id)}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-toggle-on"></i> </a>&nbsp;
                                        <a href="{{route ('user.reset-pass', $user->id)}}" class="btn-sm btn-success" onclick="confirmation(event)"><i class="fa fa-recycle"></i></a>&nbsp;
                                    </ul>
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
