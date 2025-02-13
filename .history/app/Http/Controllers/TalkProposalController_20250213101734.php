<?php
namespace App\Http\Controllers;

use App\Models\TalkProposal;
use Illuminate\Http\Request;

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
            // Store the uploaded file
        $filePath = $request->file('file')->store('proposals');

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