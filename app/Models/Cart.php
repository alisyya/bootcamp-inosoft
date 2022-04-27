<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Cart extends Eloquent
{
    use HasFactory;

    protected $fillable = [
        'nama_item',
        'stock_beli',
        'total_harga'
    ];
}
