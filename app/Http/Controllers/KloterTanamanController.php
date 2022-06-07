<?php

namespace App\Http\Controllers;

use App\Models\KloterTanaman;
use Illuminate\Http\Request;

class KloterTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kloter = KloterTanaman::with('gully')->with('benih')->get();
        return view('pages.kloter', compact('kloter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kloter = KloterTanaman::create($request->all());
        $benih = $kloter->benih;
        $rockwool = $kloter->rockwool;
        $kapasitas = $request->session()->get("appSettings")["kapasitasGully"];
        $benih->stok -= $kapasitas;
        $rockwool->stok -= $kapasitas;
        $benih->save();
        $rockwool->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KloterTanaman  $kloterTanaman
     * @return \Illuminate\Http\Response
     */
    public function show(KloterTanaman $kloterTanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KloterTanaman  $kloterTanaman
     * @return \Illuminate\Http\Response
     */
    public function edit(KloterTanaman $kloterTanaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KloterTanaman  $kloterTanaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KloterTanaman $kloterTanaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KloterTanaman  $kloterTanaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(KloterTanaman $kloterTanaman)
    {
        //
    }
}
