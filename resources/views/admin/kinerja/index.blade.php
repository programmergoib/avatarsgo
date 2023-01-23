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
                <a class="nav-link active" aria-current="page" href="{{ url('admin/kinerja') }}">Daftar Kinerja Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kinerja.create') }}">Input Kinerja Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('admin/kinerja/getdata') }}">Daftar Yang Sering Mendapatkan Peringatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('admin/kinerja/penghargaan') }}">Daftar Yang Sering Mendapatkan Penghargaan</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Rombel</th>
                                    <th>Kelompok</th>
                                    <th>Kinerja</th>
                                    <th>Tanggal Kejadian</th>
                                    <th>Saksi</th>
                                    <th>Poin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($kinerja as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->siswa->nama }}</td>
                                    <td>{{ $row->siswa->jk }}</td>
                                    <td>{{ $row->siswa->rombel->rombel }}</td>
                                    <td>{{ $row->poin->kelompok_kerja }}</td>
                                    <td>{{ $row->poin->kode_kinerja }}</td>
                                    <td>{{ $row->tanggal_kejadian }}</td>
                                    <td>{{ $row->saksi }}</td>
                                    <td>{{ $row->poin->poin }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('kinerja.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-flat btn-danger btn-sm"><i class="bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                                            </form>
                                            <a href="{{ route('kinerja.edit', $row->id) }}" class="btn btn-success btn-sm btn-flat " data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
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
</div>

@endsection