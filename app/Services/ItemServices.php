<?php

namespace App\Services;
use App\Repositories\ItemRepository;


class ItemService
{
    protected ItemRepository $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function tambahItem()
    {
        
    }
}