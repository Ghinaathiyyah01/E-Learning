@extends('app')
@section('content')
    <div class="services-area services-area2 section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8" style="margin-top: 20px">
                    <div class="section-tittle text-center mx-4">
                        <h2>{{ $nama_mapel }}</h2>
                        <p>{{ $deskripsi_mapel }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-sm-center">
                @foreach($modul as $mod)
                <div class="col-lg-12 col-md-6 col-sm-8">
                    <div class="single-services mb-30" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                        <div class="features-caption">
                            <h3>{{ $mod->judul }}</h3>
                            <p>{{ $mod->deskripsi }}</p>
                            <a href="{{ $mod->file }}" class="btn btn-primary float-right">Unduh</a>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
@endsection
