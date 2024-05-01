<div style="width: 500px">
    @forelse ($polls as $poll)
        <h3 class="font-bold capitalize">Q: {{ $poll->title }}</h3>
        <ul>
            @foreach ($poll->options as $option)
                <li @class([
                    'bg-stone-300 bg-stone-300 p-2 my-1 rounded-sm',
                    'bg-green-500' => $option->votes()->pluck('user_id')->contains(auth()->user()->id)
                ])>
                    <div class="flex justify-between" wire:click="vote({{ $option }})">
                        <span>{{ $option->title }}</span>
                        <span class="bg-slate-600 text-white rounded w-5 text-center">{{ $option->votes()->count() }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    @empty
        <p>No poll found.</p>
    @endforelse
</div>
