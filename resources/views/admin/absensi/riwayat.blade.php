@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<style>
    .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ url('admin/absensi') }}">Absensi Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('admin/absensi/riwayat') }}">Riwayat Absensi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/ubah') }}">Ubah Absensi Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/tidakhadirhariini') }}">Tidak Masuk Hari Ini</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/tidakhadirtigahari') }}">Tidak Masuk 3 Hari Berturut Turut</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('sudah') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-inline">
                                <label for="" class="form-label">Tanggal</label>&nbsp;
                                <input type="date" name="tanggal_absen" class="form-control" value="{{ $tanggal_absen }}">

                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Rombel</th>
                                                    <th>Jumlah Siswa</th>
                                                    <th>Hadir</th>
                                                    <th>Tidak Hadir</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($sudahabsen))
                                                @csrf
                                                @method('POST')
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach($sudahabsen as $row)
                                                <tr>

                                                    <td>{{ $no }}</td>

                                                    <td>{{ $row->rombel }}</td>
                                                    <td>{{ \App\Models\Siswa::where('kode_rombel',$row->kode_rombel)->count() }}</td>
                                                    <td>{{ \App\Models\Absen::where(['kode_rombel'=> $row->kode_rombel, 'tanggal_absen' => $tanggal_absen, 'status'=>'Hadir' ])->count() }}</td>
                                                    <td>{{ \App\Models\Siswa::where('kode_rombel',$row->kode_rombel)->count() - \App\Models\Absen::where(['kode_rombel'=> $row->kode_rombel, 'tanggal_absen' => $tanggal_absen, 'status'=>'Hadir' ])->count() }}</td>
                                                    <td>{{ $tanggal_absen }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg{{ $no }}">
                                                            Detail
                                                        </button>

                                                        <div class="modal fade" id="modal-lg{{ $no }}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Daftar Riwayat Absensi {{ $tanggal_absen }}</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @php
                                                                        $siswa = \App\Models\Absen::where(['kode_rombel'=> $row->kode_rombel, 'tanggal_absen'=>$tanggal_absen])->get();
                                                                        @endphp
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Nis</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Keterangan</th>
                                                                                    <th>Catatan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php
                                                                                $nos = 1;
                                                                                @endphp
                                                                                @foreach($siswa as $sw)
                                                                                <tr>
                                                                                    <td>{{$no++}}</td>
                                                                                    <td>{{$sw->siswa->nis}}</td>
                                                                                    <td>{{$sw->siswa->nama}}</td>
                                                                                    <td>
                                                                                        @if($sw->status == "Hadir")
                                                                                        <div class="badge bg-success">Hadir</div>
                                                                                        @endif
                                                                                        @if($sw->status == "Sakit")
                                                                                        <div class="badge bg-warning">Sakit</div>
                                                                                        @endif
                                                                                        @if($sw->status == "Izin")
                                                                                        <div class="badge bg-danger">Izin</div>
                                                                                        @endif
                                                                                        @if($sw->status == "Alfa")
                                                                                        <div class="badge bg-danger">Alfa</div>
                                                                                        @endif
                                                                                        @if($sw->status == "Dispen")
                                                                                        <div class="badge bg-secondary">Dispen</div>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        {{$sw->keterangan}}
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php
                                                $no++
                                                @endphp
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection