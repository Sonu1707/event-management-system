<?php
use App\Http\Controllers\Api\ReviewerController;
use App\Http\Controllers\Api\TalkProposalController;
use Illuminate\Support\Facades\Route;
// Define API routes for fetching reviewers and reviews
Route::get('/reviewers', [ReviewerController::class, 'index']);
Route::get('/talk-proposals/{id}/reviews', [TalkProposalController::class, 'getReviews']);
Route::get('/talk-proposals/stats', [TalkProposalController::class, 'getStatistics']);