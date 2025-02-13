<?php
namespace App\Http\Controllers;

use App\Models\TalkProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TalkProposalController extends Controller
{
    public function create()
    {
        return view('proposals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

     

        try {
            // Get the authenticated user
        $user = Auth::user();
// Retrieve the speaker associated with the user
$speaker = $user->speaker;
if (!$speaker) {
    return redirect()->back()->withErrors(['error' => 'You are not registered as a speaker.']);
}

// Store the file
$filePath = $request->file('presentation')->store('presentations');

// Create the talk proposal
TalkProposal::create([
    'speaker_id' => $speaker->id,
    'title' => $request->title,
    'description' => $request->description,
    'presentation_path' => $filePath,
]);

            // Create a new talk proposal
            $talkProposal = TalkProposal::create([
                'title' => $request->title,
                'description' => $request->description,
                'speaker_id' => '1',
                'presentation_path' => $filePath,
                'tags' => implode(',', $request->tags),
                'status' => 'submitted',
            ]);
  
            // Redirect to the dashboard with a success message
            return redirect()->route('proposals.dashboard')->with('success', 'Proposal submitted successfully!');
        } catch (\Exception $e) {
            // Log the error message
         print_r('Error submitting proposal: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'There was an error submitting your proposal. Please try again.']);
        }
    }

    public function dashboard()
    {
        $proposals = TalkProposal::with('speaker')->get();
        return view('proposals.dashboard', compact('proposals'));
    }
}