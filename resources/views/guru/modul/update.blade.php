@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Modul</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Modul</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Modul</h4>
                </div>
                <div class="card-body">
                    <form action="/modul/{{ $map->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $map->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Modul" rows="4">{{ $map->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="gambar" id="gambar" value="{{ $map->gambar }}">
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
