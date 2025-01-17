@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow">
                  <div class="card-icon bg-primary">
                    <i class="far fa-edit"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Agenda Hari Ini</h4>
                    </div>
                    <div class="card-body">
                      {{ $act_count->count() }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow">
                  <div class="card-icon bg-success">
                    <i class="far fa-edit"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Selesai Hari Ini</h4>
                    </div>
                    <div class="card-body">
                      {{ $act_complete->count() }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow">
                  <div class="card-icon bg-warning">
                    <i class="far fa-edit"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Pending Hari Ini</h4>
                    </div>
                    <div class="card-body">
                      {{ $act_pending->count() }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 shadow">
                  <div class="card-icon bg-info">
                    <i class="far fa-edit"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Agenda</h4>
                    </div>
                    <div class="card-body">
                      {{ $all_act->count() }}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection
