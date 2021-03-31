<?php

namespace App\Http\Controllers\API;

use App\Http\Actions\Receipt\OrderItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\SellItemRequest;

class OrderController extends Controller
{
    public function orderItems(SellItemRequest $request){
        (new OrderItem())->run($request);
        responseStatus('Order Successfully',200);
    }

}
