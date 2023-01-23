<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Izin;
use App\Models\Rombel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['izin'] = Izin::all();
        $data['title'] = "Data Izin Siswa";
        return view('admin.izin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Data Izin Siswa";
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['rombel'] = Rombel::all();
        return view('admin.izin.create', $data);
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
            'nip' => 'required|numeric',
            'nis' => 'required',
            'keterangan_izin' => 'required',
            'izin' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Izin::insert($data);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('izin.index'));
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
        $data['title'] = "Edit Data Izin Siswa";
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['rombel'] = Rombel::all();
        $data['izin'] = Izin::where('id_izin', $id)->first();
        return view('admin.izin.edit', $data);
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
            'nip' => 'required|numeric',
            'nis' => 'required',
            'keterangan_izin' => 'required',
            'izin' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Izin::where('id_izin', $id)->update($data);
        alert()->success('Sukses', 'Data siswa berhasil di update !');
        return redirect(route('izin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Izin::where('id_izin', $id)->delete();
        alert()->success('Sukses', 'Data izin berhasil di hapus !');
        return redirect(route('izin.index'));
    }
}
