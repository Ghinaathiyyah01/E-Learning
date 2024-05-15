@extends('layouts.siswa')
@section('content')
    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container" style="padding-top: 70px">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Tentang</h1>
                                {{-- <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                                        <li class="breadcrumb-item"><a href="#">Tugas</a></li> 
                                    </ol>
                                </nav> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                               
    <section class="about-area3 fix">
        <div class="support-wrapper align-items-center" style="padding-top: 70px">
            <div class="right-content3">
                <!-- img -->
                <div class="right-img">
                    <img src="assets/img/gallery/about3.png" alt="">
                </div>
            </div>
            <div class="left-content3">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Learner outcomes on courses you will take</h2>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Techniques to engage effectively with vulnerable children and young people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world
                            learning together.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="assets/img/icon/right-icon.svg" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together.
                            Online learning is as easy and natural.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Courses area End -->

@endsection