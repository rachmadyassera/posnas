@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Pembaharuan Data Operator SIAP - {{ Auth::user()->profil->organization->name }} </h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('update-operator')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="iduser" class="form-control" required value="{{$user->id}}">
                    <input type="hidden" name="idprofil" class="form-control" required value="{{$user->profil->id}}">
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="name" class="form-control" required value="{{$user->name}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" required value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>NIP </label>
                        <input type="text" name="nip" class="form-control" required value="{{$user->profil->nip}}">
                    </div>
                    <div class="form-group">
                        <label>Jabatan </label>
                        <input type="text" name="jabatan" class="form-control" required value="{{$user->profil->nohp}}">
                    </div>
                    <div class="form-group">
                        <label>No Hp </label>
                        <input type="text" name="nohp" class="form-control" required value="{{$user->profil->nohp}}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            @if ($user->status =='enable')
                            <option value = "enable" selected> Enable </option>
                            <option value = "disable"> Disable </option>
                            @else
                            <option value = "enable"> Enable </option>
                            <option value = "disable" selected> Disable </option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                            @foreach ($roles as $role)
                                @if ($user->getRoleNames()->first() ==  $role->name)
                                    <option value = "{{ $role->name }}" selected>  {{ $role->name }} </option>
                                @else
                                    <option value = "{{ $role->name }}">  {{ $role->name }}  </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
