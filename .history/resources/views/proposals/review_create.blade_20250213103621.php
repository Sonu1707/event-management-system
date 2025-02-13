@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Review for {{ $talkProposal->title }}</h1>
    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
        <input type="hidden" name="talk_proposal_id" value="{{ $talkProposal->id }}">
        <div class="form-group">
            <label for="comments">Comments</label>
            <textarea name="comments" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" class="form-control" required>
                <option value="">Select a rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
@endsection