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
                <form action="{{ route('poin.update', $poin->kode_kinerja) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">nama_kinerja</label>
                        <input type="text" name="nama_kinerja" class="form-control" value="{{ $poin->nama_kinerja }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">kelompok_kerja</label>
                        <input type="text" name="kelompok_kerja" class="form-control" value="{{ $poin->kelompok_kerja }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Poin</label>
                        <input type="number" name="poin" class="form-control" value="{{ $poin->poin }}">
                    </div>

                    <button type="submit" class="btn btn-warning" style="float: right;">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection