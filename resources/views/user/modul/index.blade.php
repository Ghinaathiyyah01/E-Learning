@extends('layouts.siswa')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Modul</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/">Beranda</a></div>
        <div class="breadcrumb-item">Modul</></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        @foreach ($mapel as $pelajaran)
        <div class="col-12 col-md-4 col-lg-4">
          <article class="article article-style-c">
            <div class="article-header">
              <div class="article-image">
                <a href="#"><img src="{{ asset('Mapel Gambar/' . $pelajaran->gambar) }}" width="300" height="400" alt=""></a>
              </div>
            </div>
            <div class="article-details">
              <div class="article-title">
                <h2><a href="#">{{ $pelajaran->nama }}</a></h2>
              </div>
              <p>{{ $pelajaran->deskripsi }}</p>
              <div class="article-cta">
                <a href="/materi/{{ $pelajaran->id }}" style="float: right">Read More <i class="fas fa-chevron-right"></i></a>
              </div>
              <br>
            </div>
          </article>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection