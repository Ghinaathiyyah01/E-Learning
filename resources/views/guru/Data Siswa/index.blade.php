@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Data Siswa</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline mr-auto" method="GET" action="/guru-data-siswa">
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                data-width="250" id="cari" value="{{$cari}}">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                        </div>
                    </form>
                    <div class="card">
                        {{-- <div class="card-header">
                        <h4><a href="/guru/ujian/create" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Tambah Data</a></h4>
                    </div> --}}
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($siswa as $s)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->email }}</td>
                                            <td>
                                                <!-- Dropdown Menu -->
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="/guru/data-siswa/update/{{ $s->id }}">Edit</a>
                                                        <form action="{{ route('guru.data-siswa.delete', $s->id) }}" method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
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
