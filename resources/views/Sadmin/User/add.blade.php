@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow col-md-6">
            <div class="card-header">
                <h4 class="card-title">Create new admin</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIP </label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Position </label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Hp </label>
                        <input type="text" name="nohp" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Organization</label>
                        <select class="form-control select2" name="org" required>
                            <option value = ""> Pilih </option>
                            @foreach ($org as $o)
                            <option value = "{{ $o->id }}"> {{ $o->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
