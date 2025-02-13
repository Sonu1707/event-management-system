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