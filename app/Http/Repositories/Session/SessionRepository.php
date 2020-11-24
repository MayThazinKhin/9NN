<?php


namespace App\Http\Repositories\Session;

use App\Models\Session;
use Illuminate\Support\Facades\Route;

class SessionRepository implements SessionInterface
{
    private $session;

    public function __construct(){
        $this->session = Session::class;
    }

    public function create($data){
        return $this->session::create($data);
    }

    public function getCurrentSessionID($table_id){
        return $this->session::where('table_id', $table_id)->where('end_time', null)->pluck('id')->last();
    }

    public function orderItems($data){
        $session = $this->checkSessionID($data['session_id']);
        $route_name = Route::currentRouteName();
        foreach ($data['items'] as $item) {
            $item_id = $item['id'];
            $count = $item['count'];
            $is_already_ordered = $session->items->contains($item_id);
            if ($is_already_ordered) {
                $old_count = $session->items()->where('item_id', $item_id)->first()->pivot->count;
                $new_count = ($route_name == 'order_items')  ? $old_count + $count : $old_count - $count;
                $session->items()->where('item_id', $item_id)->updateExistingPivot($item_id, ['count' => $new_count]);
            } else {
                $session->items()->attach($item_id, ['count' => $count]);
            }
        }
        return true;
    }

    public function getOrderItems($sessionID){
        $session = $this->checkSessionID($sessionID);
        $orders = new \stdClass();
        if ($session) {
            $items = $session->items;
            $i = 1;
            $net_total = 0;
            foreach ($items as $item) {
                $item->count = $item->pivot->count;
                $item->total = $item->count * $item->price;
                unset($item['category_id']);
                unset($item['pivot']);
                $net_total += $item->total;
            }
            $orders->items = $items;
            $orders->net_total = $net_total;
        }
        return $orders;
    }

    public function getSessionDetails($sessionID){
        $session = $this->checkSessionID($sessionID);
        $details = new \stdClass();
        $table = $session->table;
        $details->session_id = $session->id;
        $details->start_time = $session->start_time;
        $details->end_time = $session->end_time;
        $details->table_price = $table->price;
        $details->table_name = $table->name;
        return $details;
    }


    public function checkSessionID($sessionID){
        $session = $this->session::where('id', $sessionID)->first();
        if (!$session)
            responseStatus('Requested session ID is not found', 400);
        return $session;
    }
}
