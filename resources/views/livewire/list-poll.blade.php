<div>
    @forelse ($polls as $poll)
        <h3 class="font-bold capitalize">{{ $poll->title }}</h3>
        <ul>
            @foreach ($poll->options as $option)
                <li class="list-disc">{{ $option->title }}</li>
            @endforeach
        </ul>
    @empty
        <p>No poll found.</p>
    @endforelse
</div>
