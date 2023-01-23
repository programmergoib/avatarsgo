@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('adminguru.create') }}" class="btn btn-primary" style="float: right;">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($adminguru as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jk }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->no_telpon }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <div class="btn-group">
                                    <form action="{{ route('adminguru.destroy', $row->nip) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-flat btn-danger btn-sm"><i class="bi bi-trash3-fill" data-toggle="tooltip" data-placement="top" title="Hapus"></i></button>
                                    </form>
                                    <a href="{{ route('adminguru.edit', $row->nip) }}" class="btn btn-success btn-sm btn-flat " data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
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