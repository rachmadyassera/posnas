@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Category</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('category.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Add Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Name Category</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($category as $ct )
                            <tr>
                                <td>{{$ct->nama}}</td>
                                <td>
                                    <ul class="nav">
                                        <a href="{{route ('category.edit', $ct->id)}}" class="btn btn-primary mr-2">Edit</a>
                                        {{-- <a onclick="confirmation(event)" class="btn btn-warning" href="{{route ('ct.destroy', $ct->id)}}" ><i class="fas fa-trash"></i> Hapus</a> --}}
                                        <form action="{{route ('category.destroy', $ct->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                    </ul>
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
