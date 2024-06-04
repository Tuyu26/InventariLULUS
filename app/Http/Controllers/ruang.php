<?php

namespace App\Http\Controllers;

use App\Models\ruang as ModelsRuang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ruang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $judul = "ruang";

        $data = ModelsRuang::all();

        return view("ruang.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jenis = ModelsRuang::all();
        $judul = "ruang";
        return view('ruang.tambah', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('ruangs')->insert([

            'namaruang'=>  $request->namaruang,
            'koderuang'=> $request->koderuang,
            'keterangan'=> $request->keterangan

       ]);

       return redirect('/ruang');
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
        $ruang = ModelsRuang::find($id);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('ruang.edit', compact("ruang"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        DB::table('ruangs')->where('idruang',$request->idruang)->update([
            'namaruang' => $request->namaruang,
            'koderuang' => $request->koderuang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/ruang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('ruangs')->where('idruang',$id)->delete();

        return redirect('/ruang');
    }
}
