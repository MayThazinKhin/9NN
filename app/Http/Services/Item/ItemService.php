<?php


namespace App\Http\Services\Item;

use App\Http\Repositories\Item\ItemInterface;

class ItemService
{
    protected $item;
    public function __construct(ItemInterface $item){
        $this->item = $item;
    }

    public function getItemCategoriesByType($type){
        $this->item->getItemCategoriesByType($type);
    }

    public function getItemsByCategoryID($data){
        $this->item->getItemsByCategoryID($data);
    }

    public function getAllTypes(){
        $this->item->getAllTypes();
    }

    public function getItemsByTypeID($typeIDs){
        $this->item->getItemsByTypeID($typeIDs);
    }


}
