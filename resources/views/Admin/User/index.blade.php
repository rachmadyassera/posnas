@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Operator {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('create-operator')}}"  class="btn btn-icon btn-success"><i class="fas fa-plus-circle"></i> Operator</a>
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
                                    No HP : {{$user->profil->nohp}}
                                </td>
                                <td style="vertical-align: middle; ">
                                    <ul class="nav">
                                        <a href="{{route ('edit-operator', $user->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                                        @if ($user->status =='enable')
                                        <a href="{{route ('disable-operator', $user->id)}}" class="btn-sm btn-danger" onclick="confirmation_destroy(event)"> <i class="fa fa-toggle-on"></i> </a>
                                        @else
                                        <a href="{{route ('disable-operator', $user->id)}}" class="btn-sm btn-success" onclick="confirmation_destroy(event)"> <i class="fa fa-toggle-on"></i> </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{route ('reset-pass-operator', $user->id)}}" class="btn-sm btn-primary" onclick="confirmation(event)"><i class="fa fa-recycle"></i></a>&nbsp;
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
