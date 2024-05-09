@extends('app')
@section('content')
    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container" style="padding-top: 100px">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Modul Pembelajaran</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                        <li class="breadcrumb-item"><a href="#">Tugas</a></li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                               
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                </div>
            </div>
            <div class="courses-actives">
                @foreach ($mapel as $pelajaran)
                <!-- Single -->
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{ asset('Mapel Gambar/' . $pelajaran->gambar) }}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <h3>{{ $pelajaran->nama }}</h3>
                            <p>{{ $pelajaran->deskripsi }}</p>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                            </div>
                            <a href="/materi/{{ $pelajaran->id }}" class="border-btn border-btn2">Mulai Belajar</a>
                        </div>

                    </div>
                </div>
                <!-- Single -->
                @endforeach
            </div>

            
        </div>
    </div>
    <!-- Courses area End -->

@endsection