@extends('layouts.app')

@section('content')
<div class="container">
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">Absen Kelas</div>
        <div class="card-body">
            <div class="" style="overflow: scroll;height: 600px;">
                @php
                $no = 1;
                @endphp
                <ul class="list-group">
                    @foreach($rombel as $row)
                    <li class="list-group-item">{{ $row->rombel }} <a href="{{ route('guru.detailabsensi',$row->kode_rombel) }}" class="btn btn-primary float-end">Absen</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class=" card-footer">
        </div>

    </div>

</div>

<nav class="navbar navbar-dark bg-info navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="{{ url('guru/dashboard') }}" class="nav-link"><i class="bi bi-house-door-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('guru/absensi') }}" class="nav-link"><i class="bi bi-bookmark-star-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('guru/profil') }}" class="nav-link active"><i class="bi bi-person-circle"></i></a>
        </li>
    </ul>
</nav>
@endsection