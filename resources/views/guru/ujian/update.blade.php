@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Ujian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Ujian</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Ujian</h4>
                </div>
                <div class="card-body">
                    <form action="/ujian/{{ $uji->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Ujian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Ujian" value="{{ $uji->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Ujian" rows="4">{{ $uji->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu_ujian" class="col-sm-3 col-form-label">Waktu Ujian</label>
                            <div class="col-sm-8">
                                <input type="datetime-local" class="form-control" name="waktu_ujian" id="waktu_ujian" value="{{ $uji->waktu_ujian }}">
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
