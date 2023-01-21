@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body" style="height: 100px;background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 20%, rgba(0,212,255,1) 95%);">
            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" class="rounded float-start" alt="Cinque Terre" style="height: 60px;">
            <h5 class="text-center text-white mt-3">
                &nbsp;Hai, Muarif Zamzam Nur
            </h5>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p>Status Kehadiran</p>
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <i class="bi bi-bookmark-star-fill" style="color:green"></i>
                                </div>
                                <div class="col-9" style="color:green;">
                                    Hadir
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <div class="badge bg-primary float-start">71 point</div>
                </div>
                <div class="col-6">
                    <div class="badge bg-danger float-end">71 point</div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <small>Point Penghargaan</small>
                </div>
                <div class="col-6">
                    <small class="float-end">Point Pelanggaran</small>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Informasi
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="badge bg-danger"></div> <i class="bi bi-bookmark-check-fill"></i>&nbsp;Kehadiran <button class="btn btn-primary float-end"><i class="bi bi-info-square-fill"></i></button>
            </li>
            <li class="list-group-item"><i class="bi bi-award-fill"></i>&nbsp;Penghargaan <button class="btn btn-primary float-end"><i class="bi bi-info-square-fill"></i></button></li>
            <li class="list-group-item"><i class="bi bi-x-octagon-fill"></i>&nbsp;Pelanggaran<button class="btn btn-primary float-end"><i class="bi bi-info-square-fill"></i></button></li>
        </ul>
    </div>
</div>

<nav class="navbar navbar-dark bg-info navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-house-door-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('ortu/kinerja') }}" class="nav-link"><i class="bi bi-bookmark-star-fill"></i></a>
        </li>
        <a href="{{ url('ortu/kinerja') }}" class="nav-link"><i class="bi bi-bookmark-star-fill"></i></a>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-bar-chart-fill"></i></a>
        </li>
        <li class="nav-item">
            <a href="{{ url('ortu/profil') }}" class="nav-link active"><i class="bi bi-person-circle"></i></a>
        </li>
    </ul>
</nav>

@endsection