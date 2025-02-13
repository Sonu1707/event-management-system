<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    // Fillable attributes for mass assignment
    protected $fillable = ['talk_proposal_id', 'changes', 'timestamp', 'user_id'];

    // Define a relationship to TalkProposal
    public function talkProposal()
    {
        return $this->belongsTo(TalkProposal::class);
    }
}