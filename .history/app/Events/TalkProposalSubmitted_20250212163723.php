<?php
// app/Events/TalkProposalSubmitted.php
namespace App\Events;

use App\Models\TalkProposal;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TalkProposalSubmitted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $talkProposal;

    public function __construct(TalkProposal $talkProposal)
    {
        $this->talkProposal = $talkProposal;
    }

    public function broadcastOn()
    {
        return new Channel('talk-proposals'); // Channel to broadcast on
    }
}