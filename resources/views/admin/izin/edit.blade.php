@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<style>

</style>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{ url('admin/izin') }}">Daftar Izin Siswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active " href="{{ route('izin.create') }}">Input Izin Siswa</a>
            </li>
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
                        <form action="{{ route('izin.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Siswa</label>
                                <select class="form-control select2bs4" name="nis" style="width: 100%;">
                                    @foreach($siswa as $sw)
                                    <option value="{{ $sw->nis }}" @if($izin->nis == $sw->nis) selected @endif>{{ $sw->nis }} - {{ $sw->nama }} - {{ $sw->rombel->rombel }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label>Guru Piket</label>
                                    <select class="form-control select2bs4" name="nip" style="width: 100%;">
                                        @foreach($guru as $gr)
                                        <option value="{{ $gr->nip }}" @if($izin->nip == $gr->nip) selected @endif>{{ $gr->nip }} - {{ $gr->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Guru Piket</label>
                                    <select class="form-control select2bs4" name="izin" style="width: 100%;">
                                        <option value="Izin Pulang" @if($izin->izin == "Izin Pulang") selected @endif>Izin Pulang</option>
                                        <option value="Izin Keluar" @if($izin->izin == "Izin Keluar") selected @endif>Izin Keluar</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label"></label>
                                    <textarea name="keterangan_izin" class="form-control" id="" cols="30" rows="5">{{ $izin->keterangan_izin }}</textarea>
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