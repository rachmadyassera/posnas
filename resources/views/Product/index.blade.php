@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Product</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('product.create')}}"  class="btn btn-icon btn-info"><i class="fas fa-plus-circle"></i> Add Product</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td width="100px">Image</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Size</td>
                                <td>Price</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $prd )
                            <tr>
                                <td style="vertical-align: middle;">
                                @if ($prd->image)
                                <img alt="image" src="{{ asset('storage/'.$prd->image) }}" class="img-fluid">
                                @else
                                <center><img alt="image" src="{{ asset('assets/img/example-image-50.jpg') }}" class="rounded-circle mr-1"></center>
                                @endif
                                </td>
                                <td style="vertical-align: middle;">{{$prd->name}}</td>
                                <td style="vertical-align: middle;">{{$prd->nama}}</td>
                                <td style="vertical-align: middle;">{{$prd->size}}</td>
                                <td style="vertical-align: middle;">Rp. {{$prd->price}}</td>
                                <td style="vertical-align: middle;">
                                    <ul class="nav">
                                        <a href="{{route ('product.edit', $prd->id)}}" class="btn btn-primary mr-2">Edit</a>
                                        {{-- <a onclick="confirmation(event)" class="btn btn-warning" href="{{route ('user.destroy', $user->id)}}" ><i class="fas fa-trash"></i> Hapus</a> --}}
                                        <form action="{{route ('product.destroy', $prd->id)}}" method="POST">
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
