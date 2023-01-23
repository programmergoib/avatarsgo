<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Siswa;
use App\Models\Rombel;
use Ramsey\Uuid\Type\Integer;

class AbsensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data["title"] = "Absensi Siswa";
        $data['rombel'] = Rombel::all();

        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => date('Y-m-d')])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        return view('admin.absensi.index', $data);
    }
    public function tidakhadirtigahari()
    {
        $data['title'] = "Tidak Hadir 3 Hari Berturut turut";
        $today = date('Y-m-d');
        $ambil_3 = (int) date("d") - 2;
        if ($ambil_3 < 10) {
            $tgl_3 = date("Y-m") . "-0" . $ambil_3;
        } else {
            $tgl_3 = date("Y-m") . "-" . $ambil_3;
        }
        $data['siswa'] = Absen::where('status', '!=', 'Hadir')->whereBetween('tanggal_absen', [$tgl_3, $today])->selectRaw('count(nis) as jumlah, nis, kode_rombel')->groupBy('nis')->get();
        return view('admin.absensi.tidakhadirtigahari', $data);
    }
    public function ubah()
    {
        $data["title"] = "Absensi Siswa";
        $data['rombel'] = Rombel::all();

        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => date('Y-m-d')])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        return view('admin.absensi.ubahabsen', $data);
    }
    public function ubahStore(Request $request)
    {
        $data = [];
        $id = $request->id;

        $keterangan = $request->except('_token', '_method', 'nis', 'kode_rombel', 'tahun_masuk', 'tanggal_absen', 'tahun_pelajaran', 'id', 'keterangan');
        for ($i = 0; $i < count($keterangan); $i++) {

            $data[]["status"] = $keterangan['keterangan' . $i + 1];
        }
        $nis = $request->nis;
        for ($i = 0; $i < count($nis); $i++) {
            $data[$i]["nis"] = $nis[$i];
        }
        $kode_rombel = $request->kode_rombel;
        for ($i = 0; $i < count($kode_rombel); $i++) {
            $data[$i]["kode_rombel"] = $kode_rombel[$i];
            $data[$i]["tanggal_absen"] = $request->tanggal_absen;
            $tahun = (int) substr($request->tanggal_absen, 0, 4);
            $bulan = (int) substr($request->tanggal_absen, 5, 2);
            $masuk = $request->tahun_masuk;
            $selisih = $tahun - $masuk;
            if ($selisih == "0" && $bulan > 7) {
                $semester = "I";
            } elseif ($selisih == "1" && $bulan < 8) {
                $semester = "II";
            } elseif ($selisih == "1" && $bulan > 7) {
                $semester = "III";
            } elseif ($selisih == "2" && $bulan < 8) {
                $semester = "IV";
            } elseif ($selisih == "2" && $bulan > 7) {
                $semester = "V";
            } elseif ($selisih == "3" && $bulan < 8) {
                $semester = "VI";
            } elseif ($selisih == "3" && $bulan > 7) {
                $semester = "VII";
            } elseif ($selisih == "4" && $bulan < 8) {
                $semester = "VIII";
            } else {
                $semester = "";
            }
            $data[$i]["semester"] = $semester;
            $data[$i]["tahun_pelajaran"] = $request->tahun_pelajaran;
        }

        $keterangan = $request->keterangan;
        for ($i = 0; $i < count($keterangan); $i++) {
            $data[$i]["keterangan"] = $keterangan[$i];
        }
        for ($i = 0; $i < count($data); $i++) {
            $dataupdate = $data[$i];
            Absen::where('id', $id[$i])->update($dataupdate);
        }
        alert()->success('Berhasil', 'data absen di kirim !');
        return redirect(url('admin/absensi/ubah'));
    }
    public function riwayat()
    {
        $data["title"] = "Absensi Siswa" . date('Y-m-d');
        $data['rombel'] = Rombel::all();
        $data['tanggal_absen'] = date('Y-m-d');
        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => date('Y-m-d')])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        return view('admin.absensi.riwayat', $data);
    }
    public function tidakhadirhariini()
    {
        $data['title'] = "Siswa Tidak Hadir Hari Ini";
        $data['tidak_hadir'] = Absen::where(['tanggal_absen' => date('Y-m-d')])->get();
        return view('admin.absensi.tidakhadirhariini', $data);
    }
    public function absensudah(Request $request)
    {
        $data["title"] = "Absensi Siswa " . $request->tanggal_absen;
        $data['rombel'] = Rombel::all();
        $data['tanggal_absen'] = $request->tanggal_absen;

        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => $request->tanggal_absen])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        return view('admin.absensi.riwayat', $data);
    }
    public function ubahAbsensi(Request $request)
    {
        $data['tanggal_absen'] = $request->tanggal_absen;
        $data['rombel'] = Rombel::all();
        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => date('Y-m-d')])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        $query = Rombel::where('kode_rombel', $request->kode_rombel)->first();
        $absen = Absen::where(['kode_rombel' => $request->kode_rombel, 'tanggal_absen' => $request->tanggal_absen])->count();
        if ($absen > 0) {
            $data['absen'] = Absen::where(['kode_rombel' => $request->kode_rombel, 'tanggal_absen' => $request->tanggal_absen])->get();

            $data['rombel'] = Rombel::all();
            $data['title'] = "Daftar Siswa Rombel " . $query->rombel;
            $data['rombel'] = Rombel::all();
            return view('admin.absensi.ubah', $data);
        } else {
            alert()->error('Maaf ', 'Kelas belum di absen');
            return redirect(route('absensi.index'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function search(Request $request)
    {
        $data['tanggal_absen'] = $request->tanggal_absen;
        $data['rombel'] = Rombel::all();
        foreach (Rombel::all() as $row) {
            $query = Absen::where(['kode_rombel' => $row->kode_rombel, 'tanggal_absen' => date('Y-m-d')])->get();
            if (count($query) > 0) {
                $data["sudahabsen"][] = Rombel::where('kode_rombel', $row->kode_rombel)->first();
            }
        }
        $query = Rombel::where('kode_rombel', $request->kode_rombel)->first();
        $absen = Absen::where(['kode_rombel' => $request->kode_rombel, 'tanggal_absen' => $request->tanggal_absen])->count();
        if ($absen > 0) {
            alert()->error('Maaf ', 'Kelas sudah di absen');
            return redirect(route('absensi.index'));
        } else {
            $data['rombel'] = Rombel::all();


            $data['title'] = "Daftar Siswa Rombel " . $query->rombel;
            $data['rombel'] = Rombel::all();
            $data['siswa'] = Siswa::where('kode_rombel', $request->kode_rombel)->get();
            return view('admin.absensi.queryabsensi', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function kirim(Request $request)
    {

        $data = [];
        $keterangan = $request->except('_token', '_method', 'nis', 'kode_rombel', 'tahun_masuk', 'tanggal_absen', 'tahun_pelajaran', 'keterangan');
        for ($i = 0; $i < count($keterangan); $i++) {

            $data[]["status"] = $keterangan['keterangan' . $i + 1];
        }
        $nis = $request->nis;
        for ($i = 0; $i < count($nis); $i++) {
            $data[$i]["nis"] = $nis[$i];
        }
        $kode_rombel = $request->kode_rombel;
        for ($i = 0; $i < count($kode_rombel); $i++) {
            $data[$i]["kode_rombel"] = $kode_rombel[$i];
            $data[$i]["tanggal_absen"] = $request->tanggal_absen;
            $tahun = (int) substr($request->tanggal_absen, 0, 4);
            $bulan = (int) substr($request->tanggal_absen, 5, 2);
            $masuk = $request->tahun_masuk;
            $selisih = $tahun - $masuk;
            if ($selisih == "0" && $bulan > 7) {
                $semester = "I";
            } elseif ($selisih == "1" && $bulan < 8) {
                $semester = "II";
            } elseif ($selisih == "1" && $bulan > 7) {
                $semester = "III";
            } elseif ($selisih == "2" && $bulan < 8) {
                $semester = "IV";
            } elseif ($selisih == "2" && $bulan > 7) {
                $semester = "V";
            } elseif ($selisih == "3" && $bulan < 8) {
                $semester = "VI";
            } elseif ($selisih == "3" && $bulan > 7) {
                $semester = "VII";
            } elseif ($selisih == "4" && $bulan < 8) {
                $semester = "VIII";
            } else {
                $semester = "";
            }
            $data[$i]["semester"] = $semester;
            $data[$i]["tahun_pelajaran"] = $request->tahun_pelajaran;
        }
        $keterangan = $request->keterangan;
        for ($i = 0; $i < count($keterangan); $i++) {
            $data[$i]["keterangan"] = $keterangan[$i];
        }
        Absen::insert($data);
        alert()->success('Berhasil', 'data absen di kirim !');
        return redirect(route('absensi.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
