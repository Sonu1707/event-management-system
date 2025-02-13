<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpeakerController;
Route::get('/', function () {
    return view('welcome');
});
// Show the registration form
Route::get('/speaker/register', [SpeakerController::class, 'showRegistrationForm'])->name('speaker.register');

// Handle the registration request
Route::post('/speaker/register', [SpeakerController::class, 'register']);

// Public routes
Route::get('/speaker/login', [SpeakerController::class, 'showLoginForm'])->name('speaker.login');
Route::post('/speaker/login', [SpeakerController::class, 'login']);

Route::get('/proposals/create', [TalkProposalController::class, 'create'])->name('proposals.create');
Route::post('/proposals/store', [TalkProposalController::class, 'store'])->name('proposals.store');
Route::get('/proposals/dashboard', [TalkProposalController::class, 'dashboard'])->name('proposals.dashboard');
Route::get('/reviews/create/{talkProposalId}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/{talkProposalId}', [ReviewController::class, 'store'])->name('reviews.store');

/ Route to fetch all reviewers
Route::get('/reviewers', [ReviewerController::class, 'index'])->name('api.reviewers.index');

// Route to fetch proposal statistics
Route::get('/talk-proposals/stats', [TalkProposalController::class, 'getStatistics'])->name('api.talk_proposals.stats');
