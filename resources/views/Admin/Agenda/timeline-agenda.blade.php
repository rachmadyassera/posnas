@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="col-12">
            <div class="card shadow">
              <div class="card-header">
                <h4>Export jadwal kegiatan</h4>
              </div>
              <div class="card-body">
                <form action="{{route('activity.downloadTimeline')}}" method="POST">
                    @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Tanggal Awal </label>
                        <input type="date" name="tglawal" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tanggal Akhir </label>
                        <input type="date" name="tglakhir" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Data Jenis Kegiatan</label>
                        <select class="form-control" name="private" required>
                            <option value = "" selected> Pilih </option>
                            <option value = "all"> Seluruhnya </option>
                            <option value = "disprivate"> Kecualikan Private </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-right">
                        <input type="submit" value="Download" onClick="this.form.submit(); this.disabled=true; this.value='Proses…'; "  class="btn btn-success">
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

    </div>
@endsection
