@extends('layouts.app')

@section('content')
<div class="container">
    <H5 style="font-size:16px;">Rekap Absensi</H5>
     <div class="row">
                <div class="col-3 mt-2">
                    <div class="card ">
                        <small class="text-center">Hadir</small>
                        <div class="card-body bg-success">
                            <p class="card-title text-white text-center" style="12px">{{ $hadir }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-2">
                    <div class="card">
                         <small class="text-center">Sakit</small>
                        <div class="card-body bg-warning">
                            <h5 class="card-title text-white text-center">{{ $sakit }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-2">
                    <div class="card">
                      <small class="text-center">Izin</small>
                        <div class="card-body bg-info">
                            <h5 class="card-title text-white text-center">{{ $izin }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3 mt-2">
                    <div class="card">
                        <small class="text-center">Alfa</small>
                        <div class="card-body bg-danger">
                            <h5 class="card-title text-white text-center">{{ $alfa }}</h5>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container mt-3">
    <H5 style="font-size:16px;">History Absensi</H5>
    <div class="" style="overflow: scroll;height: 320px;padding:20px">
        @foreach($absensi as $row)
        @if($row->status == 'Hadir')
        <div class="card">
             <div class="alert alert-success">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title" style="font-size:12px">{{ $row->status }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->tanggal_absen)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Guru : {{ $row->keterangan }}</p></div>
               


              </div>
            </div>
        </div>
        @endif
        @if($row->status == 'Alfa')
        <div class="card">
            <div class="alert alert-danger">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title" style="font-size:12px">{{ $row->status }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->tanggal_absen)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Guru : {{ $row->keterangan }}</p></div>
               


              </div>
            </div>
        </div>
        @endif
        @if($row->status == 'Izin')
        <div class="card">
           <div class="alert alert-info">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title" style="font-size:12px">{{ $row->status }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->tanggal_absen)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Guru : {{ $row->keterangan }}</p></div>
               


              </div>
            </div>
        </div>
        @endif
        @if($row->status == 'Sakit')
        <div class="card">
             <div class="alert alert-dark">
                <div class="row">
                    <div class="col-4"> <h5 class="card-title " style="font-size:12px">{{ $row->status }}</h5></div>
                      <div class="col-4">                <p class="card-text" style="font-size:12px">{{ date('d-m-Y', strtotime($row->tanggal_absen)) }}</p></div>
                        <div class="col-4">              <p class="card-text" style="font-size:12px">Guru : {{ $row->keterangan }}</p></div>
               


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