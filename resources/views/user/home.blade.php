@extends('layouts.siswa')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">
            <h4>Informasi</h4>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-bullhorn"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Jumlah Informasi</h4>
          </div>
          <div class="card-body">
            {{ $jumlahInformasi }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">
              <h4>Modul</h4>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Modul</h4>
            </div>
            <div class="card-body">
              {{ $jumlahModul }}
            </div>
          </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">
              <h4>Ujian</h4>
            </div>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-pencil-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Ujian</h4>
            </div>
            <div class="card-body">
              {{ $jumlahUjian }}
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
