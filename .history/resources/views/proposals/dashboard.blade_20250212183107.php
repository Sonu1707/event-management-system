

@section('content')
<div class="container">
    <h1>Talk Proposals Dashboard</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Speaker</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proposals as $proposal)
            <tr>
                <td>{{ $proposal->title }}</td>
                <td>{{ $proposal->speaker->name }}</td>
                <td>{{ $proposal->status }}</td>
                <td>
                    <a href="{{ route('reviews.create', $proposal->id) }}" class="btn btn-secondary">Review</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection