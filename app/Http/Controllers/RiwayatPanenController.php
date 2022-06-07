<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\RiwayatPanen;
use Illuminate\Http\Request;

class RiwayatPanenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayatPanen = RiwayatPanen::with('kloter.benih')->get();
        return view('pages.panen', compact('riwayatPanen'));
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
        $data = $request->all();
        $cabut = (bool) $data['cabut'];
        unset($data['cabut']);
        $riwayatPanen = RiwayatPanen::create($data);
        if ($cabut) {
            $kloter = $riwayatPanen->kloter;
            $kloter->gully_id = null;
            $kloter->tgl_akhir = $riwayatPanen->tanggal;
            $kloter->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RiwayatPanen  $riwayatPanen
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatPanen $riwayatPanen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RiwayatPanen  $riwayatPanen
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatPanen $riwayatPanen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RiwayatPanen  $riwayatPanen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatPanen $riwayatPanen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RiwayatPanen  $riwayatPanen
     * @return \Illuminate\Http\Response
     */
    public function destroy(RiwayatPanen $riwayatPanen)
    {
        //
    }

    public function json()
    {
        $jenisBenih = Inventory::where('jenis', 'benih')->get()->pluck('barang');
        $panen = [];
        $random_color = function (){
            mt_srand((double)microtime()*1000000);
            $c = '';
            while(strlen($c)<6){
                $c .= sprintf("%02X", mt_rand(0, 255));
            }
            return $c;
        };
        $i = 0;
        foreach ($jenisBenih as $jenis) {
            $panenan = RiwayatPanen::with('kloter.benih')->whereHas('kloter', function ($kloter) use ($jenis) {
                $kloter->whereHas('benih', function($benih) use ($jenis) {
                    $benih->where('barang', $jenis);
                });
            })->get()->groupBy(function ($item) {
                return strtotime($item->tanggal) * 1000;
            });
            $color = $random_color();
            $panen[$i] = [
                'label' => $jenis,
                'data' => [],
                'color' => '#' . $color,
                'points' => ['fillColor' => $color, 'show' => true],
                'lines' => ['show' => true]
            ];
            foreach ($panenan as $waktu => $items) {
                $jumlah = 0;
                foreach ($items as $item) {
                    $jumlah += $item->jumlah;
                }
                $panen[$i]['data'][] = [$waktu, $jumlah];
            }
            $i++;
        }
        return response()->json($panen);
    }
}
