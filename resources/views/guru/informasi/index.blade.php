@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Informasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Informasi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="/guru/informasi/create" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Buat Informasi</a></h4>
                        </div>
                        @foreach ($informasi as $info)
                            <div class="card-body">
                                <div class="alert alert-primary alert-has-icon p-4">
                                    <div class="alert-icon"><i class="fas fa-bullhorn"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">{{ $info->judul }}</div>
                                        <p>{{ $info->deskripsi }}</p>
                                        <p style="position: absolute; top: 0; right: 0; margin: 20px;">{{ $info->tanggal }}</p>
                                    </div>
                                    <div class="position-absolute" style="bottom: 10px; right: 10px;">
                                        <a href="/informasi/update/{{ $info->id }}" class="btn btn-icon btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('informasi.delete', $info->id)}}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
