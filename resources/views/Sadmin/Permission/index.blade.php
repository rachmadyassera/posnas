@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Permission Role</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <button class="btn btn-icon btn-success" id="MybtnModal"><i class="fas fa-plus-circle"></i> Permission</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Name Permission</td>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate{{$dt->id}}">
                                            <i class="fa fa-edit"></i>
                                          </button>
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


    @include('sadmin.permission.create-modal')
    @include('sadmin.permission.edit-modal')

@endsection
