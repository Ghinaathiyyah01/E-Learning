@extends('layouts.siswa')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ujian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Beranda</a></div>
                <div class="breadcrumb-item">Ujian</>
                </div>
            </div>
        </div>  
        <br>
        <br>
        <div class="section-body">
            <div class="row">
                @foreach ($ujian as $uji)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article article-style-b">
                            <div class="article-header">
                                @php
                                    $image = '';
                                    if (str_starts_with($uji->nama, 'Ujian Akhir Semester')) {
                                        $image = '/img/uas.png';
                                    } elseif (str_starts_with($uji->nama, 'Ujian Tengah Semester')) {
                                        $image = '/img/uts.png';
                                    } elseif (str_starts_with($uji->nama, 'Kuis')) {
                                        $image = '/img/kuis.jpg';
                                    }
                                @endphp
                                <div class="article-image" data-background="{{ $image }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h5>{{ $uji->nama }}</h5>
                                </div>
                                <p>{{ $uji->deskripsi }}</p>
                                <p>{{ $uji->waktu_ujian }}</p>
                                <div class="article-cta">
                                    <a href="{{ route('ujian.index', ['ujian_id' => $uji->id]) }}">Mulai Ujian <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
