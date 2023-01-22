<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Rombel;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Data Siswa";
        $data['siswa'] = Siswa::all();
        return view('admin.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Siswa";
        $data['rombel'] = Rombel::all();
        return view('admin.siswa.create', $data);
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
            'nis' => 'required|numeric',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tahun_masuk' => 'required|numeric',

        ]);
        $data = $request->except('_method', '_token');
        $email = $request->nama . rand(1, 100000) . "@mail.com";
        $data["email"] = $email;
        Siswa::insert($data);
        User::create([
            'name' => $request->nama,
            'email' => $email,
            'password' => Hash::make("avatarg01234"),
            'role' => "ortu",
        ]);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('siswa.index'));
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
        $data['siswa'] = Siswa::where('nis', $id)->first();
        $data['title'] = "Edit Data Siswa";
        $data["rombel"] = Rombel::all();
        return view('admin.siswa.edit', $data);
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
            'nis' => 'required|numeric',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tahun_masuk' => 'required|numeric',

        ]);
        $cekemail = Siswa::where('nis', $id)->first();
        User::where('email', $cekemail->email)->update([
            'name' => $request->nama,

        ]);
        $data = $request->except('_method', '_token');
        $email = $request->nama . rand(1, 100000) . "@mail.com";
        $data["email"] = $email;
        Siswa::where('nis', $id)->update($data);
        $absencek = Absen::where('nis', $id)->count();
        if ($absencek > 0) {
            Absen::where('nis', $id)->update([
                "nis" => $request->nis,
                'kode_rombel' => $request->kode_rombel,
            ]);
        }

        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('siswa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::where('nis', $id)->count();
        if ($data <= 0) {
            Siswa::where('nis', $id)->delete();
            alert()->success('Sukses', 'Data siswa berhasil di hapus !');
            return redirect(route('rombel.index'));
        } else {
            alert()->error('Error', 'Data sedang sudah ada di absen, tidak bisa di hapus !');
            return redirect(route('siswa.index'));
        }
    }
}
