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
        return   $this->item->getItemCategoriesByType($type);
    }

    public function getItemsByCategoryID($data){
        return  $this->item->getItemsByCategoryID($data);
    }

    public function getAllTypes(){
        return  $this->item->getAllTypes();
    }

    public function getItemsByTypeID($typeIDs){
        return   $this->item->getItemsByTypeID($typeIDs);
    }
}
