<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/talk_proposals', [TalkProposalController::class, 'store'])->name('talk_proposals.store');
    Route::post('/talk_proposals/{id}/review', [TalkProposalController::class, 'review'])->name('talk_proposals.review');
});