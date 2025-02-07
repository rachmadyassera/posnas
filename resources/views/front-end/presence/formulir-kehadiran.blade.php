@extends('front-end.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')

<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
          <div class="login-brand">
            Siakra
          </div>

          <div class="card card-primary shadow">
            <div class="card-header"><h4>Pelaksanaan acara :</h4></div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>
                            {{ $rapat->judul }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $carbon::parse($rapat->tanggal)->isoFormat('dddd, D MMMM Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lokasi: <br>
                            {{ $rapat->location->nama }}
                        </td>
                    </tr>
                </table>
            </div>
          </div>
          <div class="card card-primary shadow">
            <div class="card-header"><h4>Formulir Pendaftaran Kehadiran</h4></div>

            <div class="card-body">
                <form action="{{route('participant.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="confrence" value="{{ $rapat->id }}" class="form-control" required>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <textarea name="instansi"  class="form-control" style="height: 60px;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="nohp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tandatangan anda :</label>
                    </div>
                    <div class="form-group shadow">
                        <div id="sig" ></div>
                        <br/>
                        <textarea id="signature64" name="signed" style="display:none" required>
                        </textarea>
                    </div>
                    <button id="clear" class="btn btn-danger">Hapus
                        Tandatangan</button>
                    <div class="text-right">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
          </div>
          <div class="simple-footer">
            Formulir kehadiran acara ini didaftarkan dan diselenggarakan oleh {{ $rapat->opd->nama }} Pemerintah Kota Tanjungbalai
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
