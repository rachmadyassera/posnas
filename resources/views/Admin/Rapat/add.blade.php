@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Pendaftaran Presensi Kegiatan</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('confrence.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="description"  class="form-control" style="height: 100px;" ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="datetime-local" name="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control select2" name="location" required>
                            <option value = ""> Pilih </option>
                            @foreach ($lokasi as $lks)
                            <option value = "{{ $lks->id }}"> {{ $lks->name }} ( {{ $lks->address }} )</option>
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
