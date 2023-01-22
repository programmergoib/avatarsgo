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
                <form action="{{ route('rombel.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="" class="form-label">Nama Rombel</label>
                        <input type="text" name="rombel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tahun Pelajaran</label>
                        <input type="text" name="tahun_pelajaran" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tingkat</label>
                        <input type="text" name="tingkat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jumlah Siswa</label>
                        <input type="number" name="jumlah_siswa" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection