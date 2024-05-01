<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPoll extends Component
{
    #[On('poll-created')]
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();

        return view('livewire.list-poll', [
            'polls' => $polls
        ]);
    }
}
