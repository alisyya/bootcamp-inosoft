<?php

namespace App\Repositories;

use App\Models\Item;


class ItemRepository
{
    protected $Item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getAll() : Object
    {
        $item = $this->item->get();
        return $item;
    }

    public function store(Array $data) 
    {
        try {
            $item = new $this->item;
            
            $item->title = $data['nama_item'];
            $item->title = $data['desc'];
            $item->title = $data['harga'];
            $item->title = $data['stock'];

            
            $item->save();

            $result['message'] = "Item berhasil dibuat !";
            $result['status'] = 200;
            
        } catch (\Exception $exception) {
            $result['message'] = $exception->getMessage();
            $result['status'] = 500;
        }

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

