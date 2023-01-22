@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('rombel.create') }}" class="btn btn-primary" style="float: right;">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Rombel</th>
                            <th>Tahun Pelajaran</th>
                            <th>Rombel</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($rombel as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->kode_rombel }}</td>
                            <td>{{ $row->tahun_pelajaran }}</td>
                            <td>{{ $row->rombel }}</td>
                            <td>{{ $row->tingkat }}</td>
                            <td>{{ $row->jurusan }}</td>
                            <td>{{ $row->jumlah_siswa }}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('rombel.destroy', $row->kode_rombel) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-flat btn-danger btn-sm"><i class="bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                                    </form>
                                    <a href="{{ route('rombel.edit', $row->kode_rombel) }}" class="btn btn-success btn-sm btn-flat " data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
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