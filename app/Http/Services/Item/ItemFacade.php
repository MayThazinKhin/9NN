<?php


namespace App\Http\Services\Item;

use Illuminate\Support\Facades\Facade;

/**
 * @method static getItemCategoriesByType($type)
 * @method static getItemsByCategoryID($request)
 * @method static getAllTypes()
 * @method static getItemsByTypeID($type_ids)
 */
class ItemFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\Http\Services\Item\ItemService';
    }

}
