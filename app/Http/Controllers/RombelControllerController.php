<?php

namespace App\Http\Controllers;

use App\Models\RombelController;
use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Siswa;

class RombelControllerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Rombel";
        $data['rombel'] = Rombel::all();
        return view('admin.rombel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["title"] = "Tambah Data Rombel";
        return view('admin.rombel.create', $data);
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
            'rombel' => 'required',
            'tahun_pelajaran' => 'required',
            'rombel' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'jumlah_siswa' => 'required|numeric',
        ]);
        Rombel::insert($request->except('_method', '_token'));
        alert()->success('Sukses', 'Data rombel berhasil di tambah !');
        return redirect(route('rombel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RombelController  $rombelController
     * @return \Illuminate\Http\Response
     */
    public function show(RombelController $rombelController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RombelController  $rombelController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit Data Rombel";
        $data['rombel'] = Rombel::where('kode_rombel', $id)->first();
        return view('admin.rombel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RombelController  $rombelController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rombel' => 'required',
            'tahun_pelajaran' => 'required',
            'rombel' => 'required',
            'tingkat' => 'required',
            'jurusan' => 'required',
            'jumlah_siswa' => 'required|numeric',
        ]);
        Rombel::where('kode_rombel', $id)->update($request->except('_method', '_token'));
        alert()->success('Sukses', 'Data rombel berhasil di Update !');
        return redirect(route('rombel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RombelController  $rombelController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::where('kode_rombel', $id)->count();
        if ($data <= 0) {
            Rombel::where('kode_rombel', $id)->delete();
            alert()->success('Sukses', 'Data rombel berhasil di hapus !');
            return redirect(route('rombel.index'));
        } else {
            alert()->error('Error', 'Data sedang di pakai siswa, tidak bisa di hapus !');
            return redirect(route('rombel.index'));
        }
    }
}
