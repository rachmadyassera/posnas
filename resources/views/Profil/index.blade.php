@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>{{ $title_frm }}</h1>
    </div>
</section>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card author-box card-primary shadow">
            <div class="card-body">
              <div class="author-box-left">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">
                <div class="clearfix"></div>
              </div>
              <div class="author-box-details">
                    <div class="author-box-name">
                    <a href="#">{{ $datauser->name }}</a>
                    </div>
                    @if ($datauser->role == 'superadmin')
                    <div class="author-box-job">Profil Pengguna</div>
                    <div class="author-box-description">
                        <p>Email : {{ $datauser->email }} </p>
                        </div>
                    @else

                            <div class="author-box-job">Role : {{$datauser->getRoleNames()->first()}}</div>
                            <div class="author-box-description">
                            <p>Email : {{ $datauser->email }}<br>
                            NIP :  {{ $datauser->profil->nip }}<br>
                            Jabatan :  {{ $datauser->profil->jabatan }}<br>
                            Instansi : {{ $datauser->profil->organization->name }}<br>
                            No HP :  {{ $datauser->profil->nohp }} </p>
                            </div>

                    @endif

              </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card card-success shadow">
            <div class="card-header">
                <h4 class="card-title">Perubahan Password</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('profil.change-password')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" class="form-control" value="{{$datauser->id}}" readonly>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Simpan" class="btn btn-info" onclick="confirmation()">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
