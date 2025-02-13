<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\TalkProposal;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $talkProposalId)
    {
        $request->validate([
            'comments' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'reviewer_id' => auth()->id(),
            'talk_proposal_id' => $talkProposalId,
            'comments' => $request->comments,
            'rating' => $request->rating,
        ]);

        // Notify the speaker about the review
        // Notification logic here

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}