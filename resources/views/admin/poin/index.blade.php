@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('poin.create') }}" class="btn btn-primary" style="float: right;">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kinerja</th>
                            <th>Kelompok Kerja</th>
                            <th>Poin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($poin as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama_kinerja }}</td>
                            <td>{{ $row->kelompok_kerja }}</td>
                            <td>{{ $row->poin }}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('poin.destroy', $row->kode_kinerja) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-flat btn-danger btn-sm"><i class="bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                                    </form>
                                    <a href="{{ route('poin.edit', $row->kode_kinerja) }}" class="btn btn-success btn-sm btn-flat " data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
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
@endsection