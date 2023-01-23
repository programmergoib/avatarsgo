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
                <a class="nav-link active" aria-current="page" href="{{ url('admin/absensi') }}">Laporan Per Rombel (Bulan)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('admin/absensi/riwayat') }}">Laporan Per Rombel (Semester)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/ubah') }}">Laporan Per Rombel (Periode)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/tidakhadirhariini') }}">Laporan Per Rombel (Persiswa)</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/absensi/tidakhadirtigahari') }}">Laporan Per Rombel (Alasan Izin)</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-inline">
                                <select name="tahun" id="" class="form-control">
                                    <option value="">Bulan</option>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        if ($i < 10) {
                                            $bln = "0" . $i;
                                        } else {
                                            $bln = $i;
                                        } ?>
                                        <option value="<?php echo $bln; ?>" <?php if ($bln == @$bulan) {
                                                                                echo "selected";
                                                                            } ?>><?php $aksi->bulan($bln); ?></option>
                                    <?php } ?>
                                </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection