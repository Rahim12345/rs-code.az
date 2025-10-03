<?php

namespace App\Events;

use App\Models\FreeSeoAudit;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FreeSeoAuditEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $free_seo_event;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FreeSeoAudit $free_seo_event)
    {
        $this->free_seo_event = $free_seo_event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('free-seo-event');
    }
}
