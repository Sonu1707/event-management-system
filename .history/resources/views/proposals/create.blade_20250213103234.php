@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Talk Proposal</h1>
    <form action="{{ route('proposals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags[]" class="form-control" placeholder="Add tags separated by commas">
        </div>
        <div class="form-group">
            <label for="file">Upload Presentation (PDF)</label>
            <input type="file" name="file" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit Proposal</button>
    </form>
</div>
@endsection