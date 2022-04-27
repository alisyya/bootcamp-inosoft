<?php

namespace App\Repositories;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class CartRepository 
{
    protected $cart;
    protected $item;


    public function __construct(Cart $cart,Item $item)
    {
        $this->cart = $cart;
        $this->item = $item;
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
    
    public function addItem()
    {
        $item = new $this->item;

        Cart::add($item[array(
            'id' => $this->id, 
            'nama_barang' => $this->nama_barang,
            'desc' =>$this->desc,
            'stock' => $this->stock,
            'harga' => $this->harga
        )]);
    }
}