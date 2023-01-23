<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
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
        $data['title'] = "Data Guru";
        $data['adminguru'] = Guru::all();
        return view('admin.guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Data Guru";
        return view('admin.guru.create', $data);
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
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        $email = $request->nama . rand(1, 100000) . "@mail.com";
        $data["email"] = $email;
        Guru::insert($data);
        User::create([
            'name' => $request->nama,
            'email' => $email,
            'password' => Hash::make("avatarg01234"),
            'role' => "guru",
        ]);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('adminguru.index'));
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
        $data['adminguru'] = Guru::where('nip', $id)->first();
        $data['title'] = "Edit Data Guru";
        return view('admin.guru.edit', $data);
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
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
        ]);
        $data = $request->except('_method', '_token');
        $email = $request->nama . rand(1, 100000) . "@mail.com";
        $data["email"] = $email;
        Guru::where('nip', $id)->update($data);
        User::create([
            'name' => $request->nama,
        ]);
        alert()->success('Sukses', 'Data siswa berhasil di tambah !');
        return redirect(route('adminguru.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::where('nip', $id)->delete();
        alert()->success('Sukses', 'Data siswa berhasil di hapus !');
        return redirect(route('adminguru.index'));
    }
}
