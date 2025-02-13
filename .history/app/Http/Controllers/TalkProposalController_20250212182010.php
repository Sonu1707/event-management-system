<?php
namespace App\Http\Controllers;
use App\Models\TalkProposal;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TalkProposalController extends Controller
{

    public function create()
    {
        return view('proposals.create');
    }
    
    // Store a new talk proposal
    public function store(Request $request)
    {
         // Check if the user is authenticated
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit a talk proposal.');
        }
        // Validate incoming request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'presentation' => 'required|file|mimes:pdf|max:2048', // Ensure the file is a PDF and within size limits
        ]);

        // Store the uploaded presentation file
        $path = $request->file('presentation')->store('presentations');

        // Create a new talk proposal
        $talkProposal = TalkProposal::create([
            'title' => $request->title,
            'description' => $request->description,
            'speaker_id' => Auth::id(), // Associate the proposal with the authenticated speaker
            'tags' => $request->tags,
            'presentation_path' => $path, // Store the file path
        ]);

        // Notify speaker about the submission (notification logic can be implemented here)

        return redirect()->back()->with('success', 'Talk proposal submitted successfully.');
    }

    // Review a talk proposal
    public function review(Request $request, $id)
    {
        // Validate incoming review data
        $request->validate([
            'comments' => 'required',
            'rating' => 'required|integer|min:1|max:5', // Rating must be between 1 and 5
        ]);

        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'file' => 'required|mimes:pdf|max:2048',
            ]);
    
            $filePath = $request->file('file')->store('proposals');
    
            $talkProposal = TalkProposal::create([
                'title' => $request->title,
                'description' => $request->description,
                'speaker_id' => auth()->id(),
                'file_path' => $filePath,
                'tags' => implode(',', $request->tags),
                'status' => 'submitted',
            ]);
    
            return redirect()->route('proposals.dashboard');
        }
    
        public function dashboard()
        {
            $proposals = TalkProposal::with('speaker')->get();
            return view('proposals.dashboard', compact('proposals'));
        }
}