@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                    <i class="far fa-file"></i>
                </div>
                <h4>Data Kegiatan
                </h4>
                <div class="card-description">
                    @if ($act->is_private == 'true')
                        <div class="badge badge-danger">Private</div>
                    @endif
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive shadow">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 20%">
                                    <b>Nama Kegiatan</b>
                                </td>
                                <td style="width: 5%">
                                    :
                                </td>
                                <td>
                                    {{ $act->name_activity }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Tanggal</b>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $act->date_activity }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Lokasi</b>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $act->location }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Keterangan</b>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $act->description }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Petugas Pendamping</b>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    {{ $act->accompanying_officer }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Status Kegiatan</b>
                                </td>
                                <td>
                                    :
                                </td>
                                <td>
                                    @if ($act->status_activity == 'complete')
                                        <div class="badge badge-success">Complete</div>
                                    @elseif ($act->status_activity == 'cancel')
                                        <div class="badge badge-danger">Cancel</div>
                                    @else
                                        <div class="badge badge-warning">Pending</div>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card card-hero">
            <div class="card-header">
                <div class="card-icon">
                    <i class="far fa-edit"></i>
                </div>
                <h4>Catatan</h4>
                <div class="card-description">Laporan Monitoring/Evaluasi Kegiatan </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive shadow">
                    <table class="table table-striped">
                        <tbody>
                            @if ($notes->count() < 1)
                                <tr>
                                    <td colspan="4" align="center"> Belum memiliki catatan kegiatan </td>
                                </tr>
                            @endif

                            @foreach ($notes as $nt)
                                <tr>
                                    <td style="width: 20%">
                                        <b>{{ $nt->user->name }}</b>
                                    </td>
                                    <td style="width: 5%">
                                        :
                                    </td>
                                    <td>
                                        {{ $nt->notes }}
                                    </td>
                                    <td>
                                        {{ $nt->created_at }}
                                    </td>

                                    <td>
                                        @if ($nt->user_id == Auth::user()->id)
                                            <a href="{{ route('activity.delete-note', $nt->id) }}" class="btn-sm btn-danger"
                                                onclick="confirmation_destroy(event)"> <i class="fa fa-trash"></i> </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td colspan="2">
                                        <div class="gallery gallery-md center" data-item-height="100">
                                            @foreach ($nt->documentation as $doc)
                                                <div class="gallery-item"
                                                    data-image="{{ asset('images') }}/{{ $doc->picture }}"
                                                    data-title="Image 1" href="{{ asset('images') }}/{{ $doc->picture }}"
                                                    title="Image 1"
                                                    style="height: 100px; background-image: url(&quot;{{ asset('images') }}/{{ $doc->picture }}&quot;);">
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Form Catatan dan Dokumentasi Kegiatan</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('activity.store-notes') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idactivity" id="idactivity" value="{{ $act->id }}">
                    <div class="form-group">
                        <label>Catatan </label>
                        <textarea name="notes" class="form-control" style="height: 100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="inputImage">Upload Photo :</label>
                        <label class="form-label" for="inputImage">*Rekomendasi ukuran maximal file 5Mb dan posisi
                            landscape</label>
                        <input type="file" name="images[]" id="inputImage" multiple class="form-control">
                    </div>
                    <div class="text-right">
                        <input type="submit"
                            onClick="this.form.submit(); this.disabled=true; this.value='Proses…'; "value="Simpan Data"
                            class="btn btn-success">
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
