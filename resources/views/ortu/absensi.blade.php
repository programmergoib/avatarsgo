@extends('layouts.app')

@section('content')
<div class="container">
    <H5>Rekap Absensi</H5>
    <div class="row">
        <div class="col-6 mt-2">
            <div class="card ">
                <h5 class="card-header">Hadir</h5>
                <div class="card-body bg-success">
                    <h5 class="card-title text-white">{{ $hadir }}</h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <h5 class="card-header">Sakit</h5>
                <div class="card-body bg-warning">
                    <h5 class="card-title text-white">{{ $sakit }}</h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <h5 class="card-header">Izin</h5>
                <div class="card-body bg-info">
                    <h5 class="card-title text-white">{{ $izin }}</h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <h5 class="card-header">Alfa</h5>
                <div class="card-body bg-danger">
                    <h5 class="card-title text-white">{{ $alfa }}</h5>
                </div>
            </div>
        </div>
    </div>
    <H5>History Absensi</H5>
    <div class="" style="overflow: scroll;height: 366px;">
        @foreach($absensi as $row)
        @if($row->status == 'Hadir')
        <div class="card">
            <div class="card-body bg-success">
                <h5 class="card-title text-white">{{ $row->status }}</h5>
                <p class="card-text text-white">{{ $row->tanggal_absen }}</p>
            </div>
        </div>
        @endif
        @if($row->status == 'Alfa')
        <div class="card">
            <div class="card-body bg-danger">
                <h5 class="card-title text-white">{{ $row->status }}</h5>
                <p class="card-text text-white">{{ $row->tanggal_absen }}</p>
            </div>
        </div>
        @endif
        @if($row->status == 'Izin')
        <div class="card">
            <div class="card-body bg-info">
                <h5 class="card-title text-white">{{ $row->status }}</h5>
                <p class="card-text text-white">{{ $row->tanggal_absen }}</p>
            </div>
        </div>
        @endif
        @if($row->status == 'Sakit')
        <div class="card">
            <div class="card-body bg-warning">
                <h5 class="card-title text-white">{{ $row->status }}</h5>
                <p class="card-text text-white">{{ $row->tanggal_absen }}</p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<nav class="navbar navbar-dark bg-info navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="{{ url('ortu/dashboard') }}" class="nav-link"><i class="bi bi-house-door-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('ortu/kinerja') }}" class="nav-link"><i class="bi bi-bookmark-star-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('ortu/absensi') }}" class="nav-link"><i class="bi bi-bar-chart-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('ortu/profil') }}" class="nav-link active"><i class="bi bi-person-circle"></i></a>
        </li>
    </ul>
</nav>

@endsection