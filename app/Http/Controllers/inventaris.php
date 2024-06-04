<?php

namespace App\Http\Controllers;

use App\Models\inventaris as ModelsInventaris;
use App\Models\jenis;
use App\Models\petugas;
use App\Models\ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inventaris extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ModelsInventaris::with('petugas')->get();$data = DB::table('inventaris')
        ->join('petugas', 'inventaris.idpetugas', '=', 'petugas.idpetugas')
        ->select('inventaris.*', 'petugas.namapetugas')
        ->get();

        return view('inventaris.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = petugas::all();
        $ruang = ruang::all();
        $jenis = jenis::all();
        return view('inventaris.input', compact('petugas','ruang','jenis'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
            'idjenis' => 'required',
            'tanggalregister' => 'required|date',
            'idruang' => 'required',
            'kodeinventaris' =>'required',
            'idpetugas' => 'required',
        ]);

        ModelsInventaris::create([
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'idjenis' => $request->idjenis,
            'tanggalregister' => $request->tanggalregister,
            'idruang' => $request->idruang,
            'kodeinventaris' => $request->kodeinventaris,
            'idpetugas' => $request->idpetugas
    
        ]);
        return redirect('/inventaris')->with('succes', 'inventaris created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($request->all());
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $inventaris = ModelsInventaris::find($id);
        $jenis = jenis::all();
        $ruang = Ruang::all();
        $petugas = Petugas::all();

        if(!$inventaris) {
            return redirect()->back()->with('error', 'Inventaris not found.');
        }

        return view("inventaris.edit", compact('inventaris', 'jenis', 'ruang', 'petugas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('inventaris')->where('idinventaris',$request->idinventaris)->update([
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'idjenis' => $request->idjenis,
            'tanggalregister' => $request->tanggalregister,
            'idruang' => $request->idruang,
            'kodeinventaris' => $request->kodeinventaris,
            'idpetugas' => $request->idpetugas
        ]);

        return redirect('/inventaris');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('inventaris')->where('idinventaris',$id)->delete();

        return redirect('/inventaris');

    }
}
