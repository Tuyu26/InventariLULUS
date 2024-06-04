<?php

namespace App\Http\Controllers;

use App\Models\jenis as ModelsJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jenis extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "jenis";

        $data = ModelsJenis::all();

        return view("jenis.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = ModelsJenis::all();
        $judul = "jenis";
        return view('jenis.tambah', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('jenis')->insert([

            'namajenis'=>  $request->namajenis,
            'kodejenis'=> $request->kodejenis,
            'keterangan'=> $request->keterangan

       ]);

       return redirect('/jenis');
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
         // mengambil data pegawai berdasarkan id yang dipilih
         $jenis = ModelsJenis::find($id);
         // passing data pegawai yang didapat ke view edit.blade.php
         return view('jenis.edit', compact("jenis"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('jenis')->where('idjenis',$request->idjenis)->update([
            'namajenis' => $request->namajenis,
            'kodejenis' => $request->kodejenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jenis')->where('idjenis',$id)->delete();

        return redirect('/jenis');
    }
}
