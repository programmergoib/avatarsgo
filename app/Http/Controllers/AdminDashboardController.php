<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Absen;

class AdminDashboardController extends Controller
{
    public $data;
    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['siswa'] = Siswa::count();
        $this->data['hadir'] = Absen::where(['status' => 'Hadir', 'tanggal_absen' => date('Y-m-d')])->count();
        $this->data['izin'] = Absen::where(['status' => 'Izin', 'tanggal_absen' => date('Y-m-d')])->count();
        $this->data['alfa'] = Absen::where(['status' => 'Alfa', 'tanggal_absen' => date('Y-m-d')])->count();
        $this->data['tidak_hadir'] = Absen::where(['status' => 'Alfa', 'tanggal_absen' => date('Y-m-d'), 'status' => 'Izin', 'status' => 'Sakit'])->get();
        $this->data['hari_kemarin'] = Absen::where(['status' => 'Alfa', 'tanggal_absen' => date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d")))), 'status' => 'Izin', 'status' => 'Sakit'])->get();
        return view('admin.index', $this->data);
    }
}
