@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body" style="height: 100px;background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 20%, rgba(0,212,255,1) 95%);">
            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" class="rounded float-start" alt="Cinque Terre" style="height: 60px;">
            <h5 class="text-center text-white mt-3">
                &nbsp;Hai, {{auth()->user()->name}}
            </h5>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p>Statistik Kelas Hari Ini</p>
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
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Chart
        </div>
        <ul class="list-group list-group-flush">
            <div>
                <canvas id="myChart"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Hadir', 'Alfa', 'Sakit', 'Izin'],
                            datasets: [{
                                label: '# of Votes',
                                data: ['<?= $hadir ?>', '<?= $alfa ?>', '<?= $sakit ?>', '<?= $izin ?>'],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </ul>
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