<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;

class PoinController extends Controller
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
        $data['poin'] = Poin::all();
        $data['title'] = "Data Poin Pelanggaran";
        return view('admin.poin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Poin Pelanggaran";
        return view('admin.poin.create', $data);
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
            'nama_kinerja' => 'required',
            'kelompok_kerja' => 'required',
            'poin' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Poin::insert($data);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('poin.index'));
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
        $data['poin'] = Poin::where('kode_kinerja', $id)->first();
        $data['title'] = "Edit Data Poin Pelanggaran";
        return view('admin.poin.edit', $data);
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
            'nama_kinerja' => 'required',
            'kelompok_kerja' => 'required',
            'poin' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        Poin::where('kode_kinerja', $id)->update($data);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('poin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poin::where('kode_kinerja', $id)->delete();
        return redirect(route('poin.index'));
    }
}
