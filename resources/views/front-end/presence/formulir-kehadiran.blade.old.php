@extends('front-end.main')
@section('content')
@inject('carbon', 'Carbon\Carbon')


<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Selamat datang peserta kegiatan {{ $rapat->judul }}</h4>
            </div>
            <div class="card-body">
                <p>Pelaksanaan acara :</p>
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
                    <tr>
                        <td>
                            {{ $rapat->keterangan }}
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
            <h4>Formulir pendaftaran kehadiran peserta</h4>
            </div>
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
            <div class="card-footer bg-whitesmoke">
                Penyelenggara daftar hadir kegiatan : <br>{{ $rapat->opd->nama }}
            </div>
        </div>
    </div>
  </section>
@endsection
