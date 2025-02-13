<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review; // Assuming you have a Reviewer model
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    // Method to fetch all reviewers
    public function index()
    {
        // Fetch all reviewers from the database
        $reviewers = Review::all();

        // Return the reviewers as a JSON response
        return response()->json($reviewers);
    }

    // Method to fetch a specific reviewer by ID
    public function show($id)
    {
        // Find the reviewer by ID
        $reviewer = Review::find($id);

        // Check if the reviewer exists
        if (!$reviewer) {
            return response()->json(['message' => 'Reviewer not found'], 404);
        }

        // Return the reviewer as a JSON response
        return response()->json($reviewer);
    }
}