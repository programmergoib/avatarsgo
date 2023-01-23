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
                <form action="{{ route('poin.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="" class="form-label">nama_kinerja</label>
                        <input type="text" name="nama_kinerja" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">kelompok_kerja</label>
                        <input type="text" name="kelompok_kerja" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Poin</label>
                        <input type="number" name="poin" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection