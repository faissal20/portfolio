<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('new-message.' . $this->message->to),
        ];
    }

    /**
     * Get the data to broadcast.
     *
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'message' => [
                'id' => $this->message->id,
                'message' => $this->message->content,
                'from' => $this->message->from,
                'to' => $this->message->to,
                'created_at' => $this->message->created_at->format('Y-m-d H:i:s'),
                'created_at_human' => $this->message->created_at->diffForHumans(),
                'updated_at' => $this->message->updated_at->format('Y-m-d H:i:s'),
                'updated_at_human' => $this->message->updated_at->diffForHumans(),
                'type' => $this->message->type,
                'seen' => $this->message->seen,
            ],
        ];
    }
}
