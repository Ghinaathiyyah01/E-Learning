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
                <div class="col-md-6">
                    <form class="form-inline" method="GET">
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                data-width="250" id="cari" value="{{$cari}}" name="cari">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{-- <label for="jenisUjian">Pilih Jenis Ujian:</label> --}}
                        <select class="form-control" id="jenisUjian" onchange="filterNilai()">
                            <option value="">Semua Ujian</option>
                            @foreach ($semuaUjian as $ujian)
                                <option value="{{ $ujian->id }}">{{ $ujian->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                <div class="col-12">
                    <div class="card">
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
                                            <td>{{ $no++ }}</td>
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
                        <div class="p-4">
                            {{ $nilai->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function filterNilai() {
            var ujianId = document.getElementById('jenisUjian').value;
            window.location.href = "{{ route('guru.nilai.index') }}" + "?ujian_id=" + ujianId;
        }
    </script>
@endsection
