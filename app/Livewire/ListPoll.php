<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Vote;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPoll extends Component
{
    public function vote(Option $option)
    {
        $user = auth()->user();

        $isVoted = Vote::query()->where('user_id', $user->id)->whereIn('option_id', $option->poll->options->pluck('id')->toArray())->exists();

        if ($isVoted) {
            $option->votes()->where('user_id', $user->id)->delete();
        } else {
            $option->votes()->create([
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    #[On('poll-created')]
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();

        return view('livewire.list-poll', [
            'polls' => $polls,
        ]);
    }
}
