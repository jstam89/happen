<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmed implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $message = '';

    /**
     * Create a new event instance.
     *
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;

        $user = User::all()->where('id', '=', $order->user_id)->pluck('name');

        $this->message = ".$user. Je order is bevestigd";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('orders');
    }
}
