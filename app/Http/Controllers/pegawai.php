<?php

namespace App\Http\Controllers;

use App\Models\pegawai as ModelsPegawai;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pegawai extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $judul = "pegawai";

        $data = ModelsPegawai::all();

        return view("pegawai.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis = petugas::all();
        $judul = "pegawai";
        return view('pegawai.tambah', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pegawais')->insert([

            'namapegawai'=>  $request->namapegawai,
            'nip'=> $request->nip,
            'alamat'=> $request->alamat

       ]);

       return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // mengambil data pegawai berdasarkan id yang dipilih
        $pegawai = ModelsPegawai::find($id);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pegawai.edit', compact("pegawai"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        DB::table('pegawais')->where('idpegawai',$request->idpegawai)->update([
            'namapegawai' => $request->namapegawai,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pegawais')->where('idpegawai',$id)->delete();

        return redirect('/pegawai');
    }
}
