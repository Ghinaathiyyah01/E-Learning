@extends('layouts.siswa')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Informasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Beranda</a></div>
                <div class="breadcrumb-item">Informasi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @foreach ($informasi as $info)
                            <div class="card-body">
                                <div class="alert alert-primary alert-has-icon p-4">
                                    <div class="alert-icon"><i class="fas fa-bullhorn"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">{{ $info->judul }}</div>
                                        <p>{{ $info->deskripsi }}</p>
                                        <p style="position: absolute; top: 0; right: 0; margin: 20px;">{{ $info->tanggal }}</p>
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
