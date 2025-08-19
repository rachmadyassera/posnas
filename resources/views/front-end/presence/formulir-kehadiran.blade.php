@extends('front-end.presence.main')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    {{-- <div class="login-brand">
            SISTEM INFORMASI PRESENSI KEGIATAN
          </div> --}}

                    <div class="card card-success shadow">
                        <div class="card-header bg-success">

                            <h4 class="card-title text-white"> Presensi {{ $rapat->title }} </h4>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        {{ $carbon::parse($rapat->date_confrence)->isoFormat('dddd, D MMMM Y, H:m') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Lokasi: <br>
                                        {{ $rapat->location->name }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card card-success shadow ">
                        <div class="card-header bg-success">
                            <h4 class="card-title text-white"> Formulir Kehadiran</h4>

                        </div>

                        <div class="card-body">
                            <form action="{{ route('presence.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="confrence" value="{{ $rapat->id }}" class="form-control"
                                    required>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Instansi / Organisasi</label>
                                    <textarea name="organization" class="form-control" style="height: 60px;" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="position" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>NIP / NRP / ID</label>
                                    <input type="text" name="id_employee" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="gender" required>
                                        <option value = ""> Pilih </option>
                                        <option value = "Laki-laki"> Laki-laki </option>
                                        <option value = "Perempuan"> Perempuan </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="text" name="nohp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tandatangan anda :</label>
                                </div>
                                <div class="form-group shadow">
                                    <div id="sig"></div>
                                    <br />
                                    <textarea id="signature64" name="signed" style="display:none" required>
                        </textarea>
                                </div>
                                <center>
                                    <button id="clear" class="btn btn-danger">Hapus
                                        Tandatangan</button>

                                </center>

                                <br>
                                {{-- <div class="form-group">
                        <div id="my_camera"></div>

                        <br/>
                        <center>

                            <input type="button" value="Ambil Gambar" class="btn btn-primary" onClick="take_snapshot()">

                            <input type="hidden" name="image" class="image-tag">

                        </center>
                    </div>


                    <div class="form-group">

                        <div id="results">Your captured image will appear here...</div>

                    </div> --}}

                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Kirim Presensi" class="btn btn-success btn-lg btn-block"
                            tabindex="4">
                    </div>
                    </form>
                    <div class="simple-footer">
                        Formulir kehadiran kegiatan ini didaftarkan dan diselenggarakan oleh
                        {{ $rapat->organization->name }} Pemerintah Kota Tanjungbalai
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
