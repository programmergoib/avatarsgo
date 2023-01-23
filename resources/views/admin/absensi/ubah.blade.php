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
                <a class="nav-link active" href="{{ url('admin/absensi/ubah') }}">Ubah Absensi Siswa</a>
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
                        <form action="{{ route('ubah') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-inline">
                                <label for="" class="form-label">Tanggal</label>&nbsp;
                                <input type="date" name="tanggal_absen" class="form-control" value="{{ $tanggal_absen }}">
                                <label for="" class="form-label">Rombel</label>&nbsp;
                                <select name="kode_rombel" id="" class="form-control">
                                    <option value="">Pilih Rombel</option>
                                    @foreach($rombel as $row)
                                    <option value="{{ $row->kode_rombel }}">{{ $row->rombel }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Nis</th>
                                                    <th rowspan="2">Nama</th>
                                                    <th rowspan="2">JK</th>
                                                    <th colspan="5">Keterangan</th>
                                                    <th rowspan="2">Catatan</th>
                                                </tr>
                                                <tr>
                                                    <th>Hadir</th>
                                                    <th>Sakit</th>
                                                    <th>Izin</th>
                                                    <th>Alfa</th>
                                                    <th>Dispen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <form action="{{ route('admin.absensi.ubahstore') }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    @php
                                                    $no = 1;
                                                    @endphp
                                                    @foreach($absen as $row)
                                                    <tr>
                                                        <input type="hidden" name="tanggal_absen" value="{{ date('Y-m-d') }}">
                                                        <input type="hidden" name="kode_rombel[]" value="{{ $row->kode_rombel }}">
                                                        <input type="hidden" name="id[]" value="{{ $row->id }}">
                                                        <input type="hidden" name="nis[]" value="{{ $row->nis }}">
                                                        <input type="hidden" name="tahun_masuk" value="{{ $row->siswa->tahun_masuk }}">
                                                        <input type="hidden" name="tahun_pelajaran" value="{{ $row->tahun_pelajaran }}">
                                                        <input type="hidden" name="tanggal_absen" value="{{ $tanggal_absen }}">
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $row->nis }} </td>
                                                        <td>{{ $row->siswa->nama }}</td>
                                                        <td>{{ $row->siswa->jk }}</td>
                                                        <td>
                                                            <div class="form-check">
                                                                <p><input type="radio" name="keterangan{{ $no }}" value="Hadir" class="form-check-input" @if($row->status=="Hadir") checked @endif></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <p><input type="radio" name="keterangan{{ $no }}" value="Sakit" class="form-check-input" @if($row->status=="Sakit") checked @endif></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <p><input type="radio" name="keterangan{{ $no }}" value="Izin" class="form-check-input" @if($row->status=="Izin") checked @endif></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <p><input type="radio" name="keterangan{{ $no }}" value="Alfa" class="form-check-input" @if($row->status=="Alfa") checked @endif></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <p><input type="radio" name="keterangan{{ $no }}" value="Dispen" class="form-check-input" @if($row->status=="Dispen") checked @endif></p>
                                                                <div>
                                                        </td>
                                                        <td>
                                                            <textarea cols="30" rows="1" class="form-control" name="keterangan[]">{{ $row->keterangan }}</textarea>
                                                        </td>

                                                    </tr>
                                                    @php
                                                    $no++
                                                    @endphp
                                                    @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-warning">Ubah</button>
                                        </form>
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