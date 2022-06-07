<?php

namespace App\Http\Controllers;

use App\Models\Gully;
use Illuminate\Http\Request;

class GullyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gully = Gully::all();
        return view('pages.gully', compact('gully'));
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
        $gully = Gully::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gully  $gully
     * @return \Illuminate\Http\Response
     */
    public function show(Gully $gully)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gully  $gully
     * @return \Illuminate\Http\Response
     */
    public function edit(Gully $gully)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gully  $gully
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gully $gully)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gully  $gully
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gully $gully)
    {
        //
    }
}
