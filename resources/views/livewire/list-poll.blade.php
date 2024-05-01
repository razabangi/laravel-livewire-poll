<div style="width: 500px">
    @forelse ($polls as $poll)
        <h3 class="font-bold capitalize">Q: {{ $poll->title }}</h3>
        <ul>
            @foreach ($poll->options as $option)
                <li @class([
                    'bg-slate-300 p-2 my-1 rounded-sm cursor-pointer',
                    'bg-gradient-to-r from-green-300 to-green-100' => $option->votes()->pluck('user_id')->contains(auth()->user()->id)
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
