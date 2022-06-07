<?php

namespace App\Http\Controllers;

use App\Models\Gully;
use App\Models\Inventory;
use App\Models\RiwayatPanen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $filledGully = Gully::has('kloter')->get();
        return view('pages.dashboard', compact('filledGully'));
    }
}
