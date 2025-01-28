@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Create new role</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name Role</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Permission Role</label>
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($permissions as $perm)
                                    <div class="col-md-offset-1 col-md-3 col-sm-3 col-xs-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="permissions{{$perm->id}}" name="permissions[]"
                                            value="{{ $perm->name }}" >
                                            <label class="form-check-label" for="permissions{{$perm->id}}">{{ $perm->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
