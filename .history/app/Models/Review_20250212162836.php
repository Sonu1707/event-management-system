<?php
// app/Models/Review.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Fillable attributes for mass assignment
    protected $fillable = ['reviewer_id', 'talk_proposal_id', 'comments', 'rating'];

    // Define a relationship to TalkProposal
    public function talkProposal()
    {
        return $this->belongsTo(TalkProposal::class);
    }
}