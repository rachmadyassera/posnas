@extends('front-end.presence.main')
@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    {{-- <div class="col-12"> --}}
                    <div class="login-brand">
                        SISTEM INFORMASI PRESENSI KEGIATAN
                    </div>

                    <div class="card card-success shadow rounded-lg">
                        <div class="card-header bg-success">

                            <h4 class="card-title text-white"> {{ $title }} </h4>
                        </div>
                        <div class="card-body">
                            <center><img style="width: 20%" class="img-fluid" src="{{ asset('assets/img/checklist.png') }}"
                                    alt=""><br>
                                <h4 style="color: green">PRESENSI VERIFIED</h4><br>
                                {{ $carbon::parse($pres->created_at)->isoFormat('dddd, D MMMM Y, HH:mm') }}
                                <p></p>
                                <b>{{ $pres->name }} </b> ({{ $pres->gender }})<br>
                                {{ $pres->organization }}<br>
                                {{ $pres->position }} <br>
                                NIP/NRP/ID : {{ $pres->id_employee }}<br>
                                <img class="img-fluid" src="{{ asset('presensi/signature/' . $pres->signature) }}"
                                    alt="">

                                <br>
                                <p>Dalam Kegiatan : </p>
                                <b>{{ $rapat->title }}</b><br>
                                {{ $carbon::parse($rapat->date_confrence)->isoFormat('dddd, D MMMM Y, H:mm') }}
                                <br>
                                Lokasi: <br>
                                {{ $rapat->location->name }}
                                <br>
                                <br>
                                <a href="{{ route('presence.check-in', $rapat->id) }}" class="btn btn-primary">Kembali</a>


                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
