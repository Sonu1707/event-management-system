<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User; // Assuming reviewers are users with a specific role
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function index()
    {
        // Fetch all users with the 'reviewer' role
        $reviewers = User::whereHas('roles', function ($query) {
            $query->where('name', 'reviewer'); // Adjust this based on your roles setup
        })->get();

        return response()->json($reviewers);
    }
}