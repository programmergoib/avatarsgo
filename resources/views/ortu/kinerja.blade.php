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
    <h5 style="font-size:16px">Statistik Kinerja</h5>
    <div class="row">
        <div class="col-6 mt-2">
            <div class="card ">
                <h5 class="text-center" style="font-size:12px;">Reward</h5>
                <div class="card-body bg-primary">
                    <h5 class="card-title text-white text-center" >{{ $reward }}</h5>
                </div>
            </div>
        </div>
        <div class="col-6 mt-2">
            <div class="card">
                <h5 class="text-center" style="font-size:12px;">Pelanggaran</h5>
                <div class="card-body bg-danger">
                    <h5 class="card-title text-white text-center">{{ $pelanggaran }}</h5>
                </div>
            </div>
        </div>
    </div>
    <H5 class="mt-3" style="font-size:16px">History Kinerja</H5>
    <div class="" style="overflow: scroll;height: 366px;padding:20px;">
        @php
        $pelanggaran = 0;
        $reward = 0;
        @endphp
        @foreach($kinerja as $row)
        @if($row->poin->kelompok_kerja == "PUNISHMENT")
        <div class="card">
            <div class="alert alert-success">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title" style="font-size:12px">{{ $row->poin->nama_kinerja }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->kejadian)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Poin : <div class="badge bg-danger">{{ $row->poin->poin }}</div></p></div>
               


              </div>
            </div>
        </div>
        @endif
        @if($row->poin->kelompok_kerja == "REWARD")
        <div class="card">
           <div class="alert alert-success">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title" style="font-size:12px">{{ $row->poin->nama_kinerja }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->kejadian)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Poin : <div class="badge bg-primary">{{ $row->poin->poin }}</div> </p></div>
               


              </div>
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