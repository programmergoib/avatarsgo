<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Absen;
use App\Models\Kinerja;

class OrtuDashboardController extends Controller
{
    public $siswa;
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index()
    {
        $this->siswa = Siswa::where('email', auth()->user()->email)->first();
        $kinerja = Kinerja::where(['nis' => $this->siswa->nis])->get();
        return view('ortu.index', ['siswa' => $this->siswa, 'kinerja' => $kinerja]);
    }
    public function profil()
    {
        $this->siswa = Siswa::where('email', auth()->user()->email)->first();
        $data['absensi'] = Absen::where('nis', $this->siswa->nis)->get();
        $data['hadir'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Hadir'])->count();
        $data['sakit'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Sakit'])->count();
        $data['izin'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Izin'])->count();
        $data['alfa'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Alfa'])->count();
        $kinerja = Kinerja::where(['nis' => $this->siswa->nis])->get();
        return view('ortu.profil', ['siswa' => $this->siswa, 'kinerja' => $kinerja])->with($data);
    }
    public function absensi()
    {
        $this->siswa = Siswa::where('email', auth()->user()->email)->first();
        $data['absensi'] = Absen::where('nis', $this->siswa->nis)->get();
        $data['hadir'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Hadir'])->count();
        $data['sakit'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Sakit'])->count();
        $data['izin'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Izin'])->count();
        $data['alfa'] = Absen::where(['nis' => $this->siswa->nis, 'status' => 'Alfa'])->count();
        return view('ortu.absensi', $data);
    }
    public function kinerja()
    {
        $this->siswa = Siswa::where('email', auth()->user()->email)->first();
        $data['kinerja'] = Kinerja::where(['nis' => $this->siswa->nis])->get();
        return view('ortu.kinerja', $data);
    }
}
