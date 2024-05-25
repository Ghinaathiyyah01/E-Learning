@extends('layouts.siswa')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-center p-4">
                        <h1>{{ $ujian->nama }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ujian.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ujian_id" value="{{ $ujian->id }}">
                            @php $questionNumber = 1; @endphp
                            @foreach ($soal as $pertanyaan)
                                <div class="form-group">
                                    <label style="font-size: 15px" for="jawaban_{{ $pertanyaan->id }}">{{ $questionNumber }}.
                                        {{ $pertanyaan->pertanyaan }}</label><br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]"
                                        value="{{ $pertanyaan->pilihan1 }}"> {{ $pertanyaan->pilihan1 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]"
                                        value="{{ $pertanyaan->pilihan2 }}"> {{ $pertanyaan->pilihan2 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]"
                                        value="{{ $pertanyaan->pilihan3 }}"> {{ $pertanyaan->pilihan3 }}<br>
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]"
                                        value="{{ $pertanyaan->pilihan4 }}"> {{ $pertanyaan->pilihan4 }}<br>
                                </div>
                                @php $questionNumber++; @endphp
                            @endforeach
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
