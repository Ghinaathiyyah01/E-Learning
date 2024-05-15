@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Informasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Informasi</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Informasi</h4>
                </div>
                <div class="card-body">
                    <form action="/informasi/{{ $info->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Informasi" value="{{ $info->judul }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Informasi" rows="4">{{ $info->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
