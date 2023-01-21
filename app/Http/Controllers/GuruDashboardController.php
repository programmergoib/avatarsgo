<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Rombel;
use App\Models\Siswa;

use function PHPUnit\Framework\isEmpty;

class GuruDashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != "guru") {
            return redirect('/');
        } else {

            $data['hadir'] = Absen::where(['status' => 'Hadir', 'tanggal_absen' => date('Y-m-d')])->count();
            $data['sakit'] = Absen::where(['status' => 'Sakit', 'tanggal_absen' => date('Y-m-d')])->count();
            $data['alfa'] = Absen::where(['status' => 'Alfa', 'tanggal_absen' => date('Y-m-d')])->count();
            $data['izin'] = Absen::where(['status' => 'Izin', 'tanggal_absen' => date('Y-m-d')])->count();
            return view('guru.index', $data);
        }
    }
    public function absensi()
    {
        if (auth()->user()->role != "guru") {
            return redirect('/');
        } else {

            $data['rombel'] = Rombel::get();
            return view('guru.absensi', $data);
        }
    }
    public function detailabsensi($id)
    {
        if (auth()->user()->role != "guru") {
            return redirect('/');
        } else {

            $data['siswa'] = Siswa::where('kode_rombel', $id)->get();
            return view('guru.detailabsensi', $data);
        }
    }
    public function store(Request $request)
    {
        if (auth()->user()->role != "guru") {
            return redirect('/');
        } else {

            $data = [];
            for ($i = 0; $i < count($request->kode_rombel); $i++) {
                $data[]['kode_rombel'] = $request->kode_rombel[$i];
            }
            for ($i = 0; $i < count($request->nis); $i++) {
                $data[$i]['nis'] = $request->nis[$i];
            }
            for ($i = 0; $i < count($request->tahun_pelajaran); $i++) {
                $data[$i]['tahun_pelajaran'] = $request->tahun_pelajaran[$i];
                $data[$i]['keterangan'] = auth()->user()->name;
            }
            for ($i = 0; $i < count($request->status); $i++) {
                if ($request->status[$i] == "") {
                    alert()->error('Error', 'Data Belum Lengkap !');
                    return redirect()->back();
                }
                $data[$i]['status'] = $request->status[$i];
                $data[$i]['tanggal_absen'] = date('Y-m-d');
                $data[$i]['semester'] = 1;
            }
            Absen::insert($data);
            alert()->error('Sukses', 'Data Absen Berhasil Di Kirim !');
            return redirect(url('guru/dashboard'));
        }
    }
}
