<?php

namespace App\Http\Controllers;

use App\Models\RiwayatNutrisi;
use Illuminate\Http\Request;

class RiwayatNutrisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayatNutrisi = RiwayatNutrisi::with('gully')->with('nutrisi')->get();
        return view('pages.nutrisi', compact('riwayatNutrisi'));
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
        $riwayatNutrisi = RiwayatNutrisi::create($request->all());
        $kloter = $riwayatNutrisi->gully->kloter;
        $nutrisi = $riwayatNutrisi->nutrisi;
        $kloter->jml_nutrisi += $riwayatNutrisi->jml_nutrisi;
        $nutrisi->stok -= $riwayatNutrisi->jml_nutrisi;
        $kloter->save();
        $nutrisi->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatNutrisi  $riwayatNutrisi
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatNutrisi $riwayatNutrisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatNutrisi  $riwayatNutrisi
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatNutrisi $riwayatNutrisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatNutrisi  $riwayatNutrisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatNutrisi $riwayatNutrisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatNutrisi  $riwayatNutrisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatNutrisi $riwayatNutrisi)
    {
        //
    }
}
