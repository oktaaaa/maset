<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\RutinAset;
use Illuminate\Http\Request;

class RutinAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rutinaset = RutinAset::all();
        return view('rutinaset.index') -> with('rutinasets', $rutinaset);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $aset = Aset::all();
        return view('rutinaset.create') -> with ('aset', $aset);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RutinAset $rutinAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RutinAset $rutinAset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RutinAset $rutinAset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RutinAset $rutinAset)
    {
        //
    }
}