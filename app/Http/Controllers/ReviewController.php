<?php
namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\TalkProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    // Show the form for creating a new review
    public function create(Request $request, $talkProposalId)
    {
        $talkProposal = TalkProposal::findOrFail($talkProposalId);
        return view('proposals.review_create', compact('talkProposal'));
    }

    public function store(Request $request, $talkProposalId)
    {
        $user = Auth::user();
        // Retrieve the speaker associated with the user
        $speaker = $user->speaker;
        if (!$speaker) {
            return redirect()->back()->withErrors(['error' => 'You are not registered as a speaker.']);
        }
        $request->validate([
            'comments' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'reviewer_id' => $speaker->id,
            'talk_proposal_id' => $talkProposalId,
            'comments' => $request->comments,
            'rating' => $request->rating,
        ]);

        // Notify the speaker about the review
        // Notification logic here

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

     // Fetch reviews for a specific talk proposal
     public function showReviews($talkProposalId)
     {
         $reviews = Review::where('talk_proposal_id', $talkProposalId)->with('reviewer')->get();
         return response()->json($reviews);
     }
}