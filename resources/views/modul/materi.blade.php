@extends('app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Materi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/">Beranda</a></div>
        <div class="breadcrumb-item">Materi</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">{{ $nama_mapel }}</h2>
      <p class="section-lead">{{ $deskripsi_mapel }}</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            @foreach($modul as $mod)
            <div class="card-body">
              <div class="alert alert-primary alert-has-icon p-4">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">{{ $mod->judul }}</div>
                  <p>{{ $mod->deskripsi }}</p>
                  <p class="mt-3">
                    <a href="{{ $mod->file }}" target="_blank" class="btn bg-white text-dark">Unduh</a>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
