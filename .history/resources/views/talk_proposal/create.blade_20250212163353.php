<!-- resources/views/talk_proposal/create.blade.php -->
<form action="{{ route('talk_proposals.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <input type="text" name="tags" placeholder="Tags (comma-separated)" required>
    <input type="file" name="presentation" accept=".pdf" required>
    <button type="submit">Submit Proposal</button>
</form>