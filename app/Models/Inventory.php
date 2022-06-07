<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $guarded = ['id'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'inventory_id');
    }
}
