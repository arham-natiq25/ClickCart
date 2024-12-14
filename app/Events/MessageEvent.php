<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $receiver_id;
    public $dateTime;
    /**
     * Create a new event instance.
     */
    public function __construct($message, $receiver_id, $dateTime)
    {
        $this->message = $message;
        $this->receiver_id = $receiver_id;
        $this->dateTime = $dateTime;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('message.'.$this->receiver_id),
        ];
    }

    function broadcastWith() : array {
        return [
            'message' => $this->message,
            'date_time' => $this->dateTime,
            'receiver_id' => $this->receiver_id,
            'sender_id' => auth()->user()->id,
            'sender_image' => asset(auth()->user()->image)
        ];
    }
}
