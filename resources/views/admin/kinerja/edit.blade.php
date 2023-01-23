@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<style>

</style>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('admin/kinerja') }}">Daftar Kinerja Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('kinerja.create') }}">Input Kinerja Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('admin/kinerja/getdata') }}">Daftar Yang Sering Mendapatkan Peringatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('admin/kinerja/penghargaan') }}">Daftar Yang Sering Mendapatkan Penghargaan</a>
                </li>
            </ul>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="card">

                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('kinerja.update', $kinerja->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Siswa</label>
                                <select class="form-control select2bs4" name="nis" style="width: 100%;">
                                    @foreach($siswa as $sw)
                                    <option value="{{ $sw->nis }}" @if($sw->nis == $kinerja->nis) selected @endif>{{ $sw->nis }} - {{ $sw->nama }} - {{ $sw->rombel->rombel }}</option>
                                    @endforeach
                                </select>
                                <label>Poin</label>
                                <select class="form-control select2bs4" name="kode_kinerja" style="width: 100%;">
                                    @foreach($poin as $pn)
                                    <option value="{{ $pn->kode_kinerja }}" @if($pn->kode_kinerja == $kinerja->kode_kinerja) selected @endif>{{ $pn->kode_kinerja }} - {{ $pn->nama_kinerja }} - {{ $pn->poin }} </option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label>Saksi</label>
                                    <select class="form-control select2bs4" name="saksi" style="width: 100%;">
                                        @foreach($guru as $gr)
                                        <option value="{{ $gr->nama }}" @if($gr->nama_guru == $kinerja->saksi) selected @endif>{{ $gr->nip }} - {{ $gr->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kejadian</label>
                                    <input type="date" name="tanggal_kejadian" id="" class="form-control" value="{{ $kinerja->tanggal_kejadian }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection