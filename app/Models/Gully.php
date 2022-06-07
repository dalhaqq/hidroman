<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gully extends Model
{
    use HasFactory;
    protected $table = 'gully';
    protected $guarded = ['id'];
    protected $appends = ['countdown'];

    public function kloter()
    {
        return $this->hasOne(KloterTanaman::class, 'gully_id');
    }

    public function riwayatNutrisi()
    {
        return $this->hasMany(RiwayatNutrisi::class, 'gully_id');
    }

    public function getCountdownAttribute()
    {
        $riwayatNutrisi = $this->riwayatNutrisi;
        if ($riwayatNutrisi->isEmpty()) {
            return 0;
        }
        $latest = $riwayatNutrisi->sortBy('tanggal')->first();
        $countdown = (new Carbon($latest->tanggal))->addDays(3)->diffInDays(Carbon::today()); 
        return $countdown >= 0 ? $countdown : 0;
    }
}
