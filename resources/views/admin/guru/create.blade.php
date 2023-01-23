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
                <form action="{{ route('adminguru.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="" class="form-label">Nip</label>
                        <input type="number" name="nip" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">No Telpon</label>
                        <input type="number" name="no_telpon" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection