@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Submodul</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Submodul</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Submodul</h4>
                </div>
                <div class="card-body">
                    <form action="/submodul/{{ $mod->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Submodul" value="{{ $mod->judul }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Submodul" rows="4">{{ $mod->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-sm-3 col-form-label">Link File</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="file" id="file" placeholder="Link File" rows="4">{{ $mod->file }}</textarea>
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
