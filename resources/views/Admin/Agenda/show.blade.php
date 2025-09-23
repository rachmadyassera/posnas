@extends('layouts.main') @section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container">

        <div class="row justify-content-center">
            <div class="card shadow-lg">
                <div class="card-header bg-warning">
                    <h4 class="text-white">Agenda Diwaktu yang Sama</h4>
                </div>

                <div class="card-body">
                    <div class="activities">
                        @foreach ($arround_act as $ar_act)
                            <div class="activity">
                                <div class="activity-icon bg-primary shadow-primary text-white">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="activity-detail shadow-lg">
                                    <div class="mb-2">
                                        <span
                                            class="text-job text-primary">{{ $carbon::parse($ar_act->date_activity)->isoFormat('dddd, D MMMM Y, hh:mm') }}
                                        </span>
                                    </div>
                                    <h6>{{ $ar_act->name_activity }}</h6>
                                    <p>{{ $ar_act->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-center">
                    <h4 class="text-white">Validasi Kegiatan</h4>
                </div>
                <div class="card-body">
                    <p>
                        Silahkan periksa dan sesuaikan dengan data agenda yang telah terjadwal dengan kegiatan anda, apakah
                        sudah sesuai dengan waktu yang diinginkan.
                    </p>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">

                            <a href="{{ route('activity.edit', $act->id) }}"
                                class="btn btn-icon btn-warning btn-lg btn-block text-white"> Periksa Kembali</a>
                        </div>

                        <div class="form-group col-md-6">

                            <a href="{{ route('activity.approve', $act->id) }}"
                                class="btn btn-icon btn-primary btn-lg btn-block text-white"> Setuju dan Lanjutkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
