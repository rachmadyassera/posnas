@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">List Role User</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('role.create')}}"  class="btn btn-icon btn-success"><i class="fas fa-plus-circle"></i> Role</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Name Role</td>
                                <td>Created at</td>
                                <td>Updated at</td>
                                <td style="width: 120px">Action</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datas as $dt )
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->created_at}}</td>
                                <td>{{$dt->updated_at}}</td>
                                <td>
                                    <ul class="nav">
                                        </button>
                                        <a href="{{route ('role.edit', $dt->id)}}"  class="btn btn-icon btn-success"><i class="fa fa-edit"></i></a>
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
