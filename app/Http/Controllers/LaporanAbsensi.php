<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ansensi;
use App\Models\Rombel;

class LaporanAbsensi extends Controller
{
    public function getbulan()
    {
        $data['title'] = "Laporan Absensi Rombel (Perbulan)";
        $data['rombel'] = Rombel::all();
        return view('laporan.absensi.laporanperbulan', $data);
    }
}
