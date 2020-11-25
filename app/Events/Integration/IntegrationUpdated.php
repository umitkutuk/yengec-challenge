<?php

namespace App\Events\Integration;

use App\Models\Integration;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IntegrationUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Integration
     */
    public $integration;

    /**
     * Create a new event instance.
     *
     * @param \App\Integration $integration
     */
    public function __construct(Integration $integration)
    {
        $this->integration = $integration;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
