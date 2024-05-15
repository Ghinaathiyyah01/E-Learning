@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Soal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Soal</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Soal</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilihan1" class="col-sm-3 col-form-label">Pilihan 1</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pilihan1" id="pilihan1" placeholder="Pilihan Pertama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilihan2" class="col-sm-3 col-form-label">Pilihan 2</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pilihan2" id="pilihan2" placeholder="Pilihan Kedua">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilihan3" class="col-sm-3 col-form-label">Pilihan 3</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pilihan3" id="pilihan3" placeholder="Pilihan Ketiga">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pilihan4" class="col-sm-3 col-form-label">Pilihan 4</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="pilihan4" id="pilihan4" placeholder="Pilihan Keempat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jawaban" class="col-sm-3 col-form-label">Jawaban</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jawaban" id="jawaban" placeholder="Jawaban">
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
