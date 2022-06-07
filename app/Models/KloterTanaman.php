<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KloterTanaman extends Model
{
    use HasFactory;
    protected $table = 'kloter_tanaman';
    protected $guarded = ['id'];

    public function gully()
    {
        return $this->belongsTo(Gully::class, 'gully_id');
    }

    public function benih()
    {
        return $this->belongsTo(Inventory::class, 'benih_id');
    }

    public function rockwool()
    {
        return $this->belongsTo(Inventory::class, 'rockwool_id');
    }

    public function riwayatPanen()
    {
        return $this->hasMany(RiwayatPanen::class, 'kloter_id');
    }
}
