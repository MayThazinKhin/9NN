<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Notify implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $table_id, $marker_id , $table_name, $marker_name;

    public function __construct($table_id, $marker_id,  $table_name, $marker_name)
    {
        $this->marker_id = $marker_id;
        $this->table_id = $table_id;
        $this->table_name = $table_name;
        $this->marker_name = $marker_name;
    }

    public function broadcastOn()
    {
        return ['notify-channel'];
    }

    public function broadcastAs()
    {
        return 'notify-event';
    }
}
