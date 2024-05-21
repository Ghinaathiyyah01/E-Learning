@extends('layouts.guru')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Data Siswa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
            <div class="breadcrumb-item">Edit Data Siswa</div>
        </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Siswa</h4>
            </div>
            <div class="card-body">
                <form action="/guru/data-siswa/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Siswa" value="{{ $siswa->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="emailsiswa@mail.com" value="{{ $siswa->email }}">
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