@extends('layouts.guru')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Modul</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/guru">Beranda</a></div>
                <div class="breadcrumb-item">Modul</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between mb-3">
                        <form class="form-inline" method="GET">
                            <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                    data-width="250" id="cari" value="{{$cari}}" name="cari">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <div>
                            <a href="/guru/modul/create" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Deskripsi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($mapel as $map)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td><img  src="{{ asset('Mapel Gambar') . '/' . $map->gambar }}"
                                            alt="" class="img-fluid m-2" width="100"></td>
                                        <td>{{ $map->nama }}</td>
                                        <td>{{ $map->deskripsi }}</td>
                                        <td>
                                            <!-- Dropdown Menu -->
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('submodul.index', ['mapel_id' => $map->id]) }}">Tambah Submodul</a>
                                                    <a class="dropdown-item" href="/modul/update/{{ $map->id }}">Edit</a>
                                                    <form action="{{ route('modul.delete', $map->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
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
                        <div class="p-4">
                            {{ $mapel->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
