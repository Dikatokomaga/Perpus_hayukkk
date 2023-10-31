<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();

        return view('anggota.index', compact('anggota'));
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = $request->file('foto');
        $image ->storeAs('public/anggota',$image->hashName());
        Anggota::create([
          'kode'=> $request->kode,
          'nama'=> $request->nama,
          'tempat_lahir'=> $request->tempat_lahir,
          'jenis_kelamin'=> $request->jenis_kelamin,
          'tanggal_lahir'=> $request->tanggal_lahir,
          'telpon'=> $request->telpon,
          'alamat'=> $request->alamat,
          'foto'=> $image->hashName(),
        ]);

        // $anggota = new Anggota;
       

        // Anggota::create($request->all());

        return redirect('anggota')->with('sukses', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(anggota $anggota)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $anggota->kode = $request->kode;
        $anggota->nama = $request->nama;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->telpon = $request->telpon;
        // $anggota->alamat = $request->alamat;
        $anggota->foto = $request->foto;
        $anggota->update();

        return redirect('anggota')->with('edit','Edit Berhasil Hore');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $anggota = Anggota::find($id);
        $anggota->destroy();

        return redirect('anggota')->with('adios','Data Adios njir');
    }
}
