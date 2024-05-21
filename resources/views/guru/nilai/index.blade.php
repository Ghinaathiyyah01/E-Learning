@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Nilai</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4><a href="/guru/ujian/create" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Tambah Data</a></h4>
                        </div> --}}
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Ujian</th>
                                        <th scope="col">Tanggal Pengerjaan</th>
                                        <th scope="col">Nilai</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($nilai as $nil)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $nil->user->name }}</td>
                                        <td>{{ $nil->ujian->nama }}</td>
                                        <td>{{ $nil->tanggal }}</td>
                                        <td>{{ $nil->nilai }}</td>
                                        <td>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    {{-- <a class="dropdown-item" href="{{ route('soal.index', ['ujian_id' => $uji->id]) }}">Soal</a>
                                                    <a class="dropdown-item" href="/ujian/update/{{ $uji->id }}">Edit</a> --}}
                                                    <form action="{{ route('nilai.delete', $nil->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
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