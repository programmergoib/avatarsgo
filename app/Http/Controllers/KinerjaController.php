<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kinerja;
use App\Models\Poin;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Kinerja Siswa";
        $data['kinerja'] = Kinerja::all();
        return view('admin.kinerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['poin'] = Poin::all();
        $data['title'] = "Tambah Data Kinerja Siswa";
        return view('admin.kinerja.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'saksi' => 'required',
            'nis' => 'required',
            'kode_kinerja' => 'required',
            'tanggal_kejadian' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Kinerja::insert($data);
        alert()->success('Sukses', 'Data kinerja berhasil di tambah !');
        return redirect(route('kinerja.index'));
    }
    public function getdata()
    {
        $data['kinerja'] =  DB::table('laporan_peringatan_siswa')->get();
        $data['title'] = "Daftar siswa yang mendapat peringatan";
        return view('admin.kinerja.getdata', $data);
    }
    public function penghargaan()
    {
        $data['kinerja'] =  DB::table('laporan_penghargaan_siswa')->get();
        $data['title'] = "Daftar siswa yang mendapat peringatan";
        return view('admin.kinerja.penghargaan', $data);
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
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['poin'] = Poin::all();
        $data['kinerja'] = Kinerja::where('id', $id)->first();
        $data['title'] = "Tambah Data Kinerja Siswa";
        return view('admin.kinerja.edit', $data);
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
        $validated = $request->validate([
            'saksi' => 'required',
            'nis' => 'required',
            'kode_kinerja' => 'required',
            'tanggal_kejadian' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Kinerja::where('id', $id)->update($data);
        alert()->success('Sukses', 'Data kinerja berhasil di update !');
        return redirect(route('kinerja.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kinerja::where('id', $id)->delete();
        alert()->success('Sukses', 'Data kinerja berhasil di hapus !');

        return redirect(route('kinerja.index'));
    }
}
