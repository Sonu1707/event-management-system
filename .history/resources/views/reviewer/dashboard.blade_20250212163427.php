<!-- resources/views/reviewer/dashboard.blade.php -->
<h1>Reviewer Dashboard</h1>
<form method="GET" action="{{ route('reviewer.dashboard') }}">
    <input type="text" name="search" placeholder="Search by tag or speaker name">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach($talkProposals as $proposal)
        <li>
            <h2>{{ $proposal->title }}</h2>
            <p>{{ $proposal->description }}</p>
            <a href="{{ route('reviewer.review', $proposal->id) }}">Review</a>
        </li>
    @endforeach
</ul>