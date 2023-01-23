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
                <a class="nav-link active" aria-current="page" href="{{ url('admin/izin') }}">Daftar Izin Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('izin.create') }}">Input Izin Siswa</a>
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
                                    <th>Waktu</th>
                                    <th>Izin</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($izin as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->siswa->nama }}</td>
                                    <td>{{ $row->siswa->jk }}</td>
                                    <td>{{ $row->siswa->rombel->rombel }}</td>
                                    <td>{{ $row->waktu }}</td>
                                    <td>{{ $row->izin }}</td>
                                    <td>{{ $row->keterangan_izin }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('izin.destroy', $row->id_izin) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-flat btn-danger btn-sm"><i class="bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                                            </form>
                                            <a href="{{ route('izin.edit', $row->id_izin) }}" class="btn btn-success btn-sm btn-flat " data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
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