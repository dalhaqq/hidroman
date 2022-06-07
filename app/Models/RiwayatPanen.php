<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPanen extends Model
{
    use HasFactory;
    protected $table = 'riwayat_panen';
    protected $guarded = ['id'];

    public function kloter()
    {
        return $this->belongsTo(KloterTanaman::class, 'kloter_id');
    }
}
