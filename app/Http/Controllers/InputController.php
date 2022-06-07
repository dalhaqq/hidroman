<?php

namespace App\Http\Controllers;

use App\Models\Gully;
use App\Models\Inventory;
use App\Models\KloterTanaman;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        $getInventory = function ($jenis) use ($inventory) {
            return $inventory->filter(function ($value, $key) use ($jenis) {
                return $value->jenis == $jenis;
            })->all();
        };
        $emptyGully = Gully::doesntHave('kloter')->get();
        $filledGully = Gully::has('kloter')->get();
        $benih = $getInventory('benih');
        $nutrisi = $getInventory('nutrisi');
        $rockwool = $getInventory('rockwool');
        $kloterAktif = KloterTanaman::whereNull('tgl_akhir')->get();
        return view('pages.input', compact('inventory', 'emptyGully', 'filledGully', 'benih', 'nutrisi', 'rockwool', 'kloterAktif'));
    }
}
