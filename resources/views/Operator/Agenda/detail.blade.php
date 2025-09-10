@extends('layouts.main') @section('content') @inject('carbon', 'Carbon\Carbon')
<div class="container">

        <div class="row">
            <div class="col-md-6">
              <div class="card card-hero shadow-lg">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="fas fa-handshake"></i>
                  </div>
                  <h5>{{ $act->name_activity }}</h5>
                  <div class="card-description">{{ $act->organization->name }}
                    @if ($act->is_private == 'true')
                    <div class="badge badge-danger">Private</div>
                    @endif
                </div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a class="ticket-item">
                      <div class="ticket-title">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="vertical-align: top; " class="text-left text-primary font-weight-bold"> Keterangan</td>
                                <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                                <td style="vertical-align: top; " class="text-left"> {{ $act->description }}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;" class="text-left text-primary font-weight-bold"> Lokasi</td>
                                <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                                <td style="vertical-align: top; " class="text-left"> {{ $act->location }}

                            </tr>
                            <tr>
                                <td style="vertical-align: top;" class="text-left text-primary font-weight-bold"> Pendamping</td>
                                <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                                <td style="vertical-align: top; " class="text-left"> {{ $act->accompanying_officer }}</td>
                            </tr>
                            @if ($notes->count() < 1)
                            @else
                                <tr>
                                    <td style="vertical-align: top;" class="text-left text-primary font-weight-bold"> Catatan</td>
                                    <td style="vertical-align: top; width: 50px;" class="text-center"> : </td>
                                    <td style="vertical-align: top; " class="text-left">
                                        {{ $notes->count()}} Laporan</td>
                                </tr>
                            @endif
                        </table>
                        <br>

                      </div>
                      <div class="ticket-info">
                        <div>{{ $act->user->name }}</div>
                        <div class="bullet"></div>
                        <div class="text-primary">{{ $carbon::parse($act->date_activity)->isoFormat('dddd, D MMMM Y, hh:mm') }}</div>
                      </div>
                    </a>
                        @if ($notes->where('status', '=', 'enable')->count() > 0)
                            <a href="{{ route('activity.savepdf', $act->id) }}" class="ticket-item ticket-more" style="color:green"><i
                            class="fa fa-file-pdf"></i> Unduh Data</a>
                        @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <br>
                <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Catatan</h2>
                    <p class="section-lead">Laporan Monitoring/Evaluasi Kegiatan</p>
                </div>
                </section>
              <div class="row">
                <div class="col-12">
                    <div class="activities">

                        @if ($notes->count() < 1)

                            <div class="activity">
                                <div class="activity-icon bg-danger text-white shadow-danger">
                                    <i class="fas fa-comment-slash"></i>
                                </div>
                                <div class="activity-detail shadow">
                                    <p class="text-center">
                                        Belum memiliki catatan kegiatan
                                    </p>
                                </div>
                            </div>
                        @endif
                        @foreach ($notes as $nt)

                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-comment-alt"></i>
                            </div>
                            <div class="activity-detail shadow">
                                <div class="mb-2">
                                    <span class="text-job text-primary">{{ $nt->created_at }}</span>
                                    <span class="bullet"></span>
                                    <a class="text-job">{{ $nt->user->name }}</a>


                                     @if ($nt->user_id == Auth::user()->id )
                                            <span class="bullet"></span>
                                            <a  class="text-job" style="color:red; text-decoration: underline;"  href="{{ route('activity.delete-note', $nt->id) }}" onclick="confirmation_destroy(event)">  Hapus </a>
                                            @elseif (Auth::user()->role == 'admin' AND Auth::user()->profil->organization_id ==  $nt->user->profil->organization_id )
                                            <span class="bullet"></span>
                                            <a  class="text-job" style="color:red text-decoration: underline;"  href="{{ route('activity.delete-note', $nt->id) }}" onclick="confirmation_destroy(event)">  Hapus </a>
                                    @endif

                                </div>
                                <p>{{ $nt->notes }}</p>
                                <p>
                                    <div class="gallery gallery-md center" data-item-height="100">
                                        @foreach ($nt->documentation as $doc)
                                        <div class="gallery-item" data-image="{{ asset('images') }}/{{ $doc->picture }}" data-title="Image{{$doc->id}}" href="{{ asset('images') }}/{{ $doc->picture }}" title="Image-{{$doc->id}}" style="height: 100px; background-image: url(&quot;{{ asset('images') }}/{{ $doc->picture }}&quot;);">
                                        </div>
                                        @endforeach
                                    </div>
                                </p>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
              <div class="card card-hero shadow-lg">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="fas fa-edit"></i>
                  </div>
                  <h5>Form Penginputan Catatan dan Dokumentasi</h5>
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
                            <label class="form-label" for="inputImage">Upload Photo :<br> </label>
                            <label class="form-label" for="inputImage">(*Maks 2Mb dan posisi ideal
                                    landscape)</label>
                            <input type="file" name="images[]" id="inputImage" multiple class="form-control">
                        </div>
                        <div class="text-right">
                            <input type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Proses…'; " value="Simpan Catatan" class="btn btn-success">
                        </div>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <section class="section">
                <div class="section-body">
                    <h2 class="section-title">Riwayat Catatan</h2>
                    <p class="section-lead">Perubahan data pelaporan kegiatan </p>
                </div>
                </section>
              <div class="row">
                <div class="col-12">
                    <div class="activities">

                        @if ($logs->count() < 1)

                            <div class="activity">
                                <div class="activity-icon bg-danger text-white shadow-danger">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="activity-detail shadow">
                                    <p class="text-center">
                                        Tidak ada data perubahan
                                    </p>
                                </div>
                            </div>
                        @endif
                        @foreach ($logs as $lg)

                        <div class="activity">
                            <div class="activity-icon bg-warning text-white shadow-warning">
                                <i class="fas fa-pen-nib"></i>
                            </div>
                            <div class="activity-detail shadow">
                                <div class="mb-2">
                                    <span class="text-job text-warning">{{ $lg->created_at }}</span>

                                </div>
                                <p>{{ $lg->log }}</p>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</div>


@endsection
