@extends('app')
@section('content')
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55 pt-50">
                        <h2>Modul Pembelajaran</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                @foreach ($modul as $materi)
                <!-- Single -->
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="assets/img/gallery/featured1.png" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <h3><a href="#">{{$materi->judul}}</a></h3>
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