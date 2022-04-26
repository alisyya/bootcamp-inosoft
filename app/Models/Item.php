<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Item extends Eloquent
{
    use HasFactory;
    

    protected $fillable = [
        'nama_item',
        'desc',
        'stock',
        'harga'
    ];
}
