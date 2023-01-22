@extends('layouts.appAdmin')

@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
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
                <form action="{{ route('rombel.update', $rombel->kode_rombel) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nama Rombel</label>
                        <input type="text" name="rombel" class="form-control" value="{{ $rombel->rombel }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tahun Pelajaran</label>
                        <input type="text" name="tahun_pelajaran" class="form-control" value="{{ $rombel->tahun_pelajaran }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tingkat</label>
                        <input type="text" name="tingkat" class="form-control" value="{{ $rombel->tingkat }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="{{ $rombel->jurusan }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jumlah Siswa</label>
                        <input type="number" name="jumlah_siswa" class="form-control" value="{{ $rombel->jumlah_siswa }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection