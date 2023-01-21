@extends('layouts.app')

@section('content')
<div class="container">
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">Absen Siswa <a href="{{ url('guru/absensi') }}" class="btn btn-danger float-end">Kembali</a></div>
        <div class="card-body">
            @php
            $no = 1;
            $selector=1;
            $option = 2;
            @endphp
            <div class="" style="overflow: scroll;height: 550px;">

                <form action="{{ route('guru.store') }}" method="post">
                    @csrf
                    @method('POST')
                    @foreach($siswa as $row)
                    @if($no>=2)
                    <input type="hidden" value="{{ $row->kode_rombel}}" name="kode_rombel[]">
                    <input type="hidden" value="{{ $row->nis}}" name="nis[]">
                    <input type="hidden" value="{{ $row->rombel->tahun_pelajaran }}" name="tahun_pelajaran[]">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $no++ }}&nbsp;{{ $row->nama }}

                            <select name="status[]" id="myselect{{ $selector++ }}" onchange="klikoption('<?= $option ?>')" class="form-control " disabled="disabled">
                                <option value="">Pilih Keterangan</option>
                                <option value="Hadir" onclick="klikoption('<?= $option ?>')" style="background-color: lightgreen;color:black;font-weight: bold;margin-bottom: 10px;">
                                    <div class="badge bg-success text-black text-success">Hadir</div>
                                </option>
                                <option value="Sakit" onclick="klikoption('<?= $option ?>')" style="background-color: lightyellow;color:black;font-weight: bold;margin-bottom: 10px;">Sakit</option>
                                <option value="Izin" onclick="klikoption('<?= $option ?>')" style="background-color: lightblue;color:black;font-weight: bold;margin-bottom: 10px;">Izin</option>
                                <option value="Alfa" onclick="klikoption('<?= $option ?>')" style=" background-color: lightpink;color:black;font-weight: bold;margin-bottom: 10px;">Alfa</option>
                            </select>


                        </li>
                    </ul>
                    @php
                    $option++
                    @endphp
                    @else
                    <input type="hidden" value="{{ $row->kode_rombel}}" name="kode_rombel[]">
                    <input type="hidden" value="{{ $row->nis}}" name="nis[]">
                    <input type="hidden" value="{{ $row->rombel->tahun_pelajaran }}" name="tahun_pelajaran[]">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $no++ }}&nbsp;{{ $row->nama }}

                            <select name="status[]" myselect{{ $selector++ }} onchange="klikoption('<?= $option ?>')" class="form-control">
                                <option value="">Pilih Keterangan</option>
                                <option value="Hadir" onchange="klikoption('<?= $option ?>')" style="background-color: lightgreen;color:black;font-weight: bold;margin-bottom: 10px;">
                                    <div class="badge bg-success text-black text-success">Hadir</div>
                                </option>
                                <option value="Sakit" onchange="klikoption('<?= $option ?>')" style="background-color: lightyellow;color:black;font-weight: bold;margin-bottom: 10px;">Sakit</option>
                                <option value="Izin" onchange="klikoption('<?= $option ?>')" style="background-color: lightblue;color:black;font-weight: bold;margin-bottom: 10px;">Izin</option>
                                <option value="Alfa" onchange="klikoption('<?= $option ?>')" style=" background-color: lightpink;color:black;font-weight: bold;margin-bottom: 10px;">Alfa</option>
                            </select>

                        </li>
                    </ul>
                    @php
                    $option++
                    @endphp
                    @endif
                    @endforeach
            </div>
        </div>
        <div class=" card-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
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
<script>
    function klikoption(data) {
        console.log("ok");
        const selector = data + 1;
        console.log(selector);
        $("#myselect" + data).removeAttr("disabled");
    }
</script>
@endsection