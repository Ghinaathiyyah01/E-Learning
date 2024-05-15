@extends('layouts.siswa')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Hasil Ujian</div>

                    <div class="card-body">
                        <h4>Detail Ujian:</h4>
                        {{-- <p>Nama Ujian: {{ $nilai->ujian->nama }}</p>
                        <p>Deskripsi Ujian: {{ $nilai->ujian->deskripsi }}</p>
                        <p>Waktu Ujian: {{ $nilai->ujian->waktu_ujian }}</p>
                        <hr> --}}
                        <h4>Nilai Anda:</h4>
                        <p>{{ $nilai->nilai }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
