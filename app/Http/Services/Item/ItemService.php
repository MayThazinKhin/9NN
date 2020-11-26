<?php


namespace App\Http\Services\Item;


use App\Http\Repositories\Item\ItemInterface;

class ItemService
{
    protected static $item;
    public function __construct(ItemInterface $item){
        self::$item = $item;
    }

    public function getItemCategoriesByType($type){
        return self::getItemCategoriesByType($type);
    }

    public function getItemsByCategoryID($request){
        return self::getItemsByCategoryID($request);
    }

    public function getAllTypes(){
        return self::getAllTypes();
    }

    public function getItemsByTypeID(array $typeIDs){
        return self::getItemsByTypeID($typeIDs);
    }

}
