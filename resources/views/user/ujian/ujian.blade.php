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
                        <form id="ujianForm" action="{{ route('ujian.submit') }}" method="POST">
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
                                    <small class="text-danger" id="validationMsg_{{ $pertanyaan->id }}"></small>
                                </div>
                                @php $questionNumber++; @endphp
                            @endforeach
                            <button type="button" onclick="validateForm()" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            let allQuestionsAnswered = true;
            const form = document.getElementById('ujianForm');
            const questions = form.querySelectorAll('input[type="radio"]');
            
            questions.forEach(question => {
                const questionId = question.name.split('[')[1].split(']')[0];
                const validationMsg = document.getElementById(`validationMsg_${questionId}`);
                
                if (!question.checked) {
                    validationMsg.innerText = 'Harap pilih jawaban untuk pertanyaan ini.';
                    allQuestionsAnswered = false;
                } else {
                    validationMsg.innerText = '';
                }
            });

            if (allQuestionsAnswered) {
                form.submit();
            } else {
                // Tidak melakukan submit karena ada pertanyaan yang belum dijawab
            }
        }

    </script>
@endsection
