@extends('layouts.app')

@section('content')
<div class="container">
    @php
    $pelanggaran = 0;
    $reward = 0;
    @endphp
    @foreach($kinerja as $row)
    @if($row->poin->kelompok_kerja == "PUNISHMENT")
    @php
    $pelanggaran += $row->poin->poin;
    @endphp
    @endif
    @if($row->poin->kelompok_kerja == "REWARD")
    @php
    $reward += $row->poin->poin;
    @endphp
    @endif
    @endforeach
    <h5>Statistik Kinerja</h5>
    <div class="row">
        <div class="col-6 mt-2">
            <div class="card ">
                <h5 class="card-header">Reward</h5>
                <div class="card-body bg-primary">
                    <h5 class="card-title text-white">{{ $reward }}</h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <h5 class="card-header">Pelanggaran</h5>
                <div class="card-body bg-danger">
                    <h5 class="card-title text-white">{{ $pelanggaran }}</h5>
                </div>
            </div>
        </div>
    </div>
    <H5 class="mt-3">History Kinerja</H5>
    <div class="" style="overflow: scroll;height: 366px;">
        @php
        $pelanggaran = 0;
        $reward = 0;
        @endphp
        @foreach($kinerja as $row)
        @if($row->poin->kelompok_kerja == "PUNISHMENT")
        <div class="card">
            <div class="card-body bg-danger">
                <h5 class="card-title text-white">{{ $row->poin->nama_kinerja }}</h5>
                <p class="card-text text-white">
                    @php
                    $pelanggaran += $row->poin->poin;
                    @endphp
                <div class="badge bg-success">Point : {{ $row->poin->poin }}</div>
                </p>
                <p class="card-text text-white">Tanggal Kejadian : {{ $row->tanggal_kejadian }}</p>
            </div>
        </div>
        @endif
        @if($row->poin->kelompok_kerja == "REWARD")
        <div class="card">
            <div class="card-body bg-primary">
                <h5 class="card-title text-white">{{ $row->poin->nama_kinerja }}</h5>
                <p class="card-text text-white">
                    @php
                    $reward += $row->poin->poin;
                    @endphp
                <div class="badge bg-danger">Point : {{ $row->poin->poin }}</div>
                </p>
                <p class="card-text text-white">Tanggal Kejadian : {{ $row->tanggal_kejadian }}</p>
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