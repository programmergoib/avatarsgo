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
                <form action="{{ route('siswa.update', $siswa->nis) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nis</label>
                        <input type="number" name="nis" class="form-control" value="{{ $siswa->nis }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="L" @if($siswa->jk=="L" ) selected @endif>Laki - Laki</option>
                            <option value="P" @if($siswa->jk=="P" ) selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $siswa->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Tahun Masuk</label>
                        <input type="text" name="tahun_masuk" class="form-control" value="{{ $siswa->tahun_masuk }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Rombel</label>
                        <select name="kode_rombel" id="" class="form-control">
                            @foreach($rombel as $row)
                            <option value="{{ $row->kode_rombel }}" @if($siswa->kode_rombel==$row->kode_rombel ) selected @endif>{{ $row->rombel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning" style="float: right;">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection