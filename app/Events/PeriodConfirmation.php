<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PeriodConfirmation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $is_confirm;

    public function __construct($is_confirm)
    {
        $this->is_confirm = $is_confirm;
    }

    public function broadcastOn()
    {
        return ['confirm-channel'];
    }

    public function broadcastAs()
    {
        return 'confirm-event';
    }


}
