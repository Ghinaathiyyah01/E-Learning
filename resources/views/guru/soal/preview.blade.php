@extends('layouts.guru')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $ujian->nama }}</div>

                    <div class="card-body">
                        <p>{{ $ujian->deskripsi }}</p>
                        <p>Waktu Ujian: {{ $ujian->waktu_ujian }}</p>
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="ujian_id" value="{{ $ujian->id }}">
                            @foreach($soal as $pertanyaan)
                                <div class="form-group">
                                    <label for="jawaban_{{ $pertanyaan->id }}">{{ $pertanyaan->pertanyaan }}</label><br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $pertanyaan->pilihan1 }}"> {{ $pertanyaan->pilihan1 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $pertanyaan->pilihan2 }}"> {{ $pertanyaan->pilihan2 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $pertanyaan->pilihan3 }}"> {{ $pertanyaan->pilihan3 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $pertanyaan->pilihan4 }}"> {{ $pertanyaan->pilihan4 }}<br>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
