@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Formulir Pendaftaran Kegiatan {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('activity.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tanggal </label>
                                <input type="datetime-local" name="date_activity" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kegiatan</label>
                                <select class="form-control" name="private" required>
                                    <option value = "" selected> Pilih </option>
                                    <option value = "true"> Private </option>
                                    <option value = "false"> Umum </option>
                                </select>
                            </div>
                    </div>


                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="name_activity" class="form-control" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Lokasi </label>
                            <textarea name="location" class="form-control" style="height: 100px;"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Pendamping </label>
                            <textarea name="accompanying_officer" class="form-control" style="height: 100px;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi </label>
                        <textarea name="description" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="text-right">
                        <input type="submit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
