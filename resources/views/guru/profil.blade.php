@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">
        <img class="card-img-top" src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ auth()->user()->name }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item  ">{{ auth()->user()->role }}</li>
            <li class="list-group-item">{{ auth()->user()->email }}</li>

        </ul>
        <div class="card-body">

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