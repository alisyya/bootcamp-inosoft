<?php

namespace App\Repositories;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartRepository 
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }


    public function save ($data)
    {
        $cart = new $this->cart;

        $cart->desc = $data['stock_beli'];
        $cart->harga = $data['total_harga'];
        $cart->save();

        return $cart->fresh();
        
    }

    public function getStok(string $id, string $namaBarang): ?int
    {
        $query = DB::collection($namaBarang)
        ->where('nama_barang', $namaBarang)
        ->value('stock');
        return $query;
    }
}