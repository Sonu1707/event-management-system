<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TalkProposalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Api\SpeakerAuthController;
Route::get('/', function () {
    return view('welcome');
});

// Public routes
Route::post('/speaker/login', [SpeakerAuthController::class, 'login']);


Route::get('/proposals/create', [TalkProposalController::class, 'create'])->name('proposals.create');
Route::post('/proposals', [TalkProposalController::class, 'store'])->name('proposals.store');
Route::get('/proposals/dashboard', [TalkProposalController::class, 'dashboard'])->name('proposals.dashboard');
Route::post('/reviews/{talkProposalId}', [ReviewController::class, 'store'])->name('reviews.store');