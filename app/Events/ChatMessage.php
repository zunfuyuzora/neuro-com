<?php

namespace App\Events;

use App\Group;
use App\Member;
use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Member who send the message
     */
    public $member;

    /**
     * Group channel subscribe
     */
    public $group;

    /**
     * Message details
     * 
     */
    public $message;

    /**
     * Timestamp
     */
    public $created_at;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Group $group, Member $member, Message $message)
    {
        $this->group = $group;
        $this->member = $member->user->full_name;
        $this->message = $message->message;
        $this->created_at = $message->created_at;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('group.'.$this->group->id);
    }

    /**
     * 
     */
    public function subscription_succeeded(){
        return "Yay";
    }
}
