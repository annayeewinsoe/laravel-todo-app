<ul class="list-group">
    @foreach($items as $each)
        <li class="list-group-item">
            {{ $each->title }}<br>
            Created By: <span class="btn btn-dark btn-sm">{{ $each->user->name }}</span><br>
            Completed: 
            @if($each->completed === 1)
                <span class="btn btn-success btn-sm">Yes</span>
            @else
                <span class="btn btn-light btn-sm">No</span>
            @endif

            @if($show_button)
                <form method="POST" action="" id="change_completed_form" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $each->id }}">
                    <button type="submit" class="btn btn-secondary btn-sm">Switch {{ $each->completed === 1 ? 'No' : 'Yes' }}</button>
                </form>
            @endif

            @if($delete_button)
            <div class="d-grid">
                <a href="{{ route('delete_todo', ['todo'=>$each]) }}" class="btn btn-danger" type="button">Delete</a>
            </div>
            @endif
        </li>
    @endforeach
</ul>