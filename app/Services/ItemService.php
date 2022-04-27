<?php

namespace App\Services;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ItemService
{
    protected  $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    
    public function getAll()
    {
        return $this->itemRepository->getAll();
    }

    public function saveTambahItem($data)
    {
        $validator = Validator::make($data,[
            'nama_item' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'stock' => 'required'

        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->itemRepository->save($data);

        return $result;
    }
}