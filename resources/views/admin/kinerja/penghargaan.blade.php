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
                <a class="nav-link" aria-current="page" href="{{ url('admin/kinerja') }}">Daftar Kinerja Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('kinerja.create') }}">Input Kinerja Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('admin/kinerja/getdata') }}">Daftar Yang Sering Mendapatkan Peringatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('admin/kinerja/penghargaan') }}">Daftar Yang Sering Mendapatkan Penghargaan</a>
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
                                    <th>Jumlah Skor</th>
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
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jk }}</td>
                                    <td>@php
                                        $data = \App\Models\Siswa::where('nis', $row->nis)->first()
                                        @endphp
                                        {{$data->rombel->rombel}}

                                    </td>
                                    <td>
                                        @php
                                        $total = 0;
                                        $sering = \App\Models\Kinerja::where('nis', $row->nis)->get();
                                        foreach($sering as $sr){
                                        if($sr->poin->kelompok_kerja = "Penghargaan"){

                                        $total += $sr->poin->poin;
                                        }
                                        }
                                        @endphp
                                        {{$total}}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg{{ $no }}">
                                            Detail
                                        </button>

                                        <div class="modal fade" id="modal-lg{{ $no }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Daftar Riwayat Kinerja</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Tanggal Kejadian</th>
                                                                    <th>Nama Kinerja</th>
                                                                    <th>Saksi</th>
                                                                    <th>Skor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $nos = 1;
                                                                @endphp
                                                                @foreach($sering as $sw)
                                                                <tr>
                                                                    <td>{{$nos++}}</td>
                                                                    <td>{{$sw->tanggal_kejadian}}</td>
                                                                    <td>

                                                                        <div class="badge bg-primary">Penghargaan | {{$sw->poin->nama_kinerja}} </div>

                                                                    </td>
                                                                    <td>

                                                                        {{$sw->saksi}}

                                                                    </td>
                                                                    <td>

                                                                        {{$sw->poin->poin}}

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