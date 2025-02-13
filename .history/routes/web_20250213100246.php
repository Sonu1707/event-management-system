<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpeakerController;
Route::get('/', function () {
    return view('welcome');
});
// Show the registration form
Route::get('/speaker/register', [SpeakerAuthController::class, 'showRegistrationForm'])->name('speaker.register');

// Handle the registration request
Route::post('/speaker/register', [SpeakerAuthController::class, 'register']);

// Public routes
Route::get('/speaker/login', [SpeakerController::class, 'showLoginForm'])->name('speaker.login');
Route::post('/speaker/login', [SpeakerController::class, 'login']);

Route::get('/proposals/create', [TalkProposalController::class, 'create'])->name('proposals.create');
Route::post('/proposals', [TalkProposalController::class, 'store'])->name('proposals.store');
Route::get('/proposals/dashboard', [TalkProposalController::class, 'dashboard'])->name('proposals.dashboard');
Route::post('/reviews/{talkProposalId}', [ReviewController::class, 'store'])->name('reviews.store');