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
                <a class="nav-link " href="{{ url('admin/absensi/riwayat') }}">Riwayat Absensi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/ubah') }}">Ubah Absensi Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('admin/absensi/tidakhadirhariini') }}">Tidak Masuk Hari Ini</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/tidakhadirtigahari') }}">Tidak Masuk 3 Hari Berturut Turut</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nis</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach($tidak_hadir as $row)
                                                @if($row->status!="Hadir")
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $row->nis }}</td>
                                                    <td>{{ $row->siswa->nama }}</td>
                                                    <td>{{ $row->rombel->rombel }}</td>

                                                    <td>{{ $row->status}}</td>
                                                </tr>
                                                @endif
                                                @endforeach
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