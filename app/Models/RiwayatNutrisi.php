<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatNutrisi extends Model
{
    use HasFactory;
    protected $table = 'riwayat_nutrisi';
    protected $guarded = ['id'];

    public function gully()
    {
        return $this->belongsTo(Gully::class, 'gully_id');
    }

    public function nutrisi()
    {
        return $this->belongsTo(Inventory::class, 'nutrisi_id');
    }
}
