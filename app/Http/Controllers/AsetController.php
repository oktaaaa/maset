<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Test\TestStatus\Known;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asets = Aset::all();
        return view('aset.index') -> with('asets', $asets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $asets = Aset::all();
        return view('aset.create') -> with ('asets', $asets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'jenis_aset' => 'required',
            'merk' => 'required',
            'tipe' => 'required|unique:asets',
            'foto' => 'required|file|image',
            's_n'=> 'required',
            'owner'=> 'required',
            'th_produksi'=> 'required' ,
            'th_pengadaan'=> 'required',
            'th_penggunaan'=> 'required',
            'lokasi',
            'koordinate',
            'status' => 'required',
            'kondisi' => 'required',
            'penanggung_jawab'
        ]);

        $aset = new Aset();
        $aset->jenis_aset = $validasi['jenis_aset'];
        $aset->merk = $validasi['merk'];
        $aset->tipe = $validasi['tipe'];
        $aset->s_n = $validasi['s_n'];
        $aset->owner = $validasi['owner'];
        $aset->th_produksi = $validasi['th_produksi']  ?? null;;
        $aset->th_pengadaan = $validasi['th_pengadaan'] ?? null;;
        $aset->th_penggunaan = $validasi['th_penggunaan'] ?? null;;
        $aset->lokasi = $validasi['lokasi']  ?? null;;
        $aset->koordinat = $validasi['koordinat'] ?? null;;
        $aset->status = $validasi['status'];
        $aset->kondisi = $validasi['kondisi'];
        $aset->penanggung_jawab = $validasi['penanggung_jawab'] ?? null;;
    
        // foto
        $ext = $request -> foto -> getClientOriginalExtension();
        $new_filename = $validasi['merk'] . '.' . $ext;
        $request -> foto -> storeAs('public', $new_filename);

        $aset -> foto = $new_filename;
        $aset -> save();
        return redirect() -> route ('aset.index') -> with('success', 'Data berhasil disimpan' . $validasi['jenis_aset']. $validasi['tipe']);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        //
    }
}