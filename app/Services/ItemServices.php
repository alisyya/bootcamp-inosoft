<?php

namespace App\Services;
use App\Repositories\ItemRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ItemService
{
    protected ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function tambahItem($data)
    {
        $validator = Validator::make($data,[
            'nama_item' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'stok' => 'required'

        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->itemRepository->$data->save();

        return $result;
    }
}