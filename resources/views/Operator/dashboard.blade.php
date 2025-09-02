@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <div class="row">
                @can('agenda-list')
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h4>Jadwal Kegiatan Hari Ini</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Waktu</th>
                                                <th>Lokasi</th>
                                                <th>Keterangan</th>
                                                <th>Pendamping</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($today as $td)
                                                <tr>
                                                    <td>
                                                        {{ $td->name_activity }}

                                                        @if ($td->status_activity == 'complete')
                                                            <div class="badge badge-success"><i class="fas fa-check"></i></div>
                                                        @elseif ($td->status_activity == 'cancel')
                                                            <div class="badge badge-danger"><i class="fas fa-window-close"></i>
                                                            </div>
                                                        @else
                                                        @endif
                                                        @if ($td->is_private == 'true')
                                                            <div class="badge badge-danger">Private</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $td->date_activity }}
                                                    </td>
                                                    <td>
                                                        {{ $td->location }}
                                                    </td>
                                                    <td>
                                                        {{ $td->description }}
                                                    </td>
                                                    <td>
                                                        {{ $td->accompanying_officer }}
                                                    </td>
                                                    <td>

                                                        @if ($td->status_activity !== 'cancel')
                                                            <div class="btn-group mb-2">
                                                                <button class="btn btn-dark dropdown-toggle" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu" x-placement="bottom-start"
                                                                    style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('show-activity', $td->id) }}">Detail</a>
                                                                    @if ($td->status_activity == 'pending')
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('activity.cancel-activity', $td->id) }}">Cancel</a>
                                                                </div>
                                                        @endif
                                </div>
                                @endif
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Jadwal Kegiatan Besok</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Kegiatan</th>
                                            <th>Waktu</th>
                                            <th>Lokasi</th>
                                            <th>Keterangan</th>
                                            <th>Pendamping</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tomorrow as $tm)
                                            <tr>
                                                <td>
                                                    {{ $tm->name_activity }}

                                                    @if ($td->is_private == 'true')
                                                        <div class="badge badge-danger">Private</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $tm->date_activity }}
                                                </td>
                                                <td>
                                                    {{ $tm->location }}
                                                </td>
                                                <td>
                                                    {{ $tm->deskripsi }}
                                                </td>
                                                <td>
                                                    {{ $tm->accompanying_officer }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

        </div>
        </div>
    </section>

@endsection
