@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Soal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Soal</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><a href="/guru/soal/create" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Tambah Data</a></h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pertanyaan</th>
                                        <th scope="col">Pilihan 1</th>
                                        <th scope="col">Pilihan 2</th>
                                        <th scope="col">Pilihan 3</th>
                                        <th scope="col">Pilihan 4</th>
                                        <th scope="col">Jawaban</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($soal as $sol)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $sol->pertanyaan }}</td>
                                        <td>{{ $sol->pilihan1 }}</td>
                                        <td>{{ $sol->pilihan2 }}</td>
                                        <td>{{ $sol->pilihan3 }}</td>
                                        <td>{{ $sol->pilihan4 }}</td>
                                        <td>{{ $sol->jawaban }}</td>
                                        <td>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="/soal/update/{{ $sol->id }}">Edit</a>
                                                    <form action="{{ route('soal.delete', $sol->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
