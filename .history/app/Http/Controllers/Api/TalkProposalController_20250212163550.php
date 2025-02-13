<?php
// app/Http/Controllers/Api/TalkProposalController.php
namespace App\Http\Controllers\Api;

use App\Models\TalkProposal;
use App\Models\Review;
use Illuminate\Http\Request;

class TalkProposalController extends Controller
{
    // Fetch reviews for a specific talk proposal
    public function getReviews($id)
    {
        return Review::where('talk_proposal_id', $id)->get(); // Return all reviews for the proposal
    }

    // Fetch statistics about talk proposals
    public function getStatistics()
    {
        $totalProposals = TalkProposal::count(); // Count total proposals
        $averageRating = Review::avg('rating'); // Calculate average rating
        $proposalsPerTag = TalkProposal::selectRaw('tags, count(*) as count')->groupBy('tags')-> get(); // Group proposals by tags and count them

        return response()->json([
            'total_proposals' => $totalProposals,
            'average_rating' => $averageRating,
            'proposals_per_tag' => $proposalsPerTag,
        ]);
    }
}