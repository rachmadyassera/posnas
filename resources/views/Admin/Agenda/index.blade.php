@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Data Agenda {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{ route('activity.create') }}" class="btn btn-icon btn-success"><i
                                class="fas fa-plus-circle"></i> Kegiatan</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables-disordering" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Tanggal</td>
                                <td>Kegiatan</td>
                                <td>Keterangan</td>
                                <td>Status</td>
                                <td>Author</td>
                                <td>Dibuat</td>
                                <td>Diperbaharui</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($activity as $act)
                                <tr>
                                    <td style="width:100px">{{ $act->date_activity }}</td>
                                    <td>{{ $act->name_activity }}
                                        @if ($act->is_private == 'true')
                                            <div class="badge badge-danger">Private</div>
                                        @endif
                                        <br>
                                        <br>
                                        Lokasi : <br>{{ $act->location }}

                                    </td>
                                    <td>{{ $act->description }}</td>
                                    <td>
                                        @if ($act->status_activity == 'complete')
                                            <div class="badge badge-success">Complete</div>
                                        @elseif ($act->status_activity == 'cancel')
                                            <div class="badge badge-danger">Cancel</div>
                                        @else
                                            <div class="badge badge-warning">Pending</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->id == $act->user->id)
                                            Anda
                                        @else
                                            {{ $act->user->name }}
                                        @endif
                                    </td>
                                    <td>{{ $act->created_at }}</td>
                                    <td>{{ $act->updated_at }}</td>
                                    <td style="width: 75px">
                                        <ul class="nav">
                                            @if ($act->status_activity == 'pending')
                                                @if (Auth::user()->id == $act->user_id or $role == 'admin')
                                                    <a href="{{ route('activity.edit', $act->id) }}"
                                                        class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    &nbsp;
                                                    <a href="{{ route('activity.cancel-activity', $act->id) }}"
                                                        class="btn-sm btn-danger" onclick="confirmation(event)"><i
                                                            class="fa fa-window-close"></i></a>
                                                @else
                                                @endif
                                            @else
                                            @endif


                                            &nbsp;
                                            <a href="{{ route('show-activity', $act->id) }}"
                                                class="btn-sm btn-success"><i class="fa fa-eye"></i></a>

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

    <button class="btn btn-primary floating" id="MybtnModal"><i class="fa fa-search-location fa-xs"></i></button>

    <div class="modal fade" role="dialog" id="fire-modal-2" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pencarian Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('activity.searching') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Tanggal Awal </label>
                            <input type="date" name="tglawal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir </label>
                            <input type="date" name="tglakhir" class="form-control" required>
                        </div>

                        <div class="text-right">
                            <input type="submit" value="Cari" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const rows = document.querySelectorAll("#datatables-disordering tr");

        rows.forEach((row, index) => {
            if (index === 0) return; // skip header
            // const umur = parseInt(row.cells[1].innerText);
            const operator = row.cells[4].innerText.trim();

            // Jika status = "Aktif" warnai hijau
            if (operator === "Anda") {
                row.style.backgroundColor = "lightyellow";
            }

            // Jika umur > 30 warnai kuning
            // if (umur > 30) {
            //     row.style.backgroundColor = "yellow";
            // }
        });
    </script>
@endsection
