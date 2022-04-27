<?php

namespace App\Repositories;

use App\Models\Item;


class ItemRepository
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getAll() : Object
    {
        $item = $this->item->get();
        return $item;
    }

    
    public function save ($data)
    {
        $item = new $this->item;

        $item->nama_item = $data['nama_item'];
        $item->desc = $data['desc'];
        $item->harga = $data['harga'];
        $item->stock = $data['stock'];

        $item->save();

        return $item->fresh();
        
    }
}

