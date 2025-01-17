@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Update Category</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('category.update', $category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="nama" class="form-control" required value="{{$category->nama}}">
                    </div>
                    <input type="submit" value="Simpan Data" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
