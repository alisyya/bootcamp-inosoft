<?php

namespace App\Repositories;

use App\Models\Item;


class ItemRepository
{
    protected $Item;

    public function __construct(Item $item)
    {
        $this->Item = $item;
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
            
            $item->save();

            $result['message'] = "Item berhasil dibuat !";
            $result['status'] = 200;
            
        } catch (\Exception $exception) {
            $result['message'] = $exception->getMessage();
            $result['status'] = 500;
        }

    }
}

