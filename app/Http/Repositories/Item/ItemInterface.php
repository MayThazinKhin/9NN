<?php


namespace App\Http\Repositories\Item;


interface ItemInterface
{
    public function getItemCategoriesByType($type);

    public function getItemsByCategoryID($request);

    public function getAllTypes();

    public function getItemsByTypeID(array $typeIDs);


}
