@extends('layouts.siswa')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nilai Anda</h4>
                    {{-- <div class="card-header-action">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div> --}}
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <i class="fas fa-th"></i>
                                    </th>
                                    <th>Ujian</th>
                                    <th>Tanggal Pengerjaan</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $data)
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                <i class="fas fa-th"></i>
                                            </div>
                                        </td>
                                        <td>{{ $data->ujian->nama }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->nilai }}/100</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
