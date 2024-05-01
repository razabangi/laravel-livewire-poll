<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PollCreate extends Component
{
    public string $title;
    public array $options = [''];

    public function add() {
        $this->options[] = '';
    }

    public function remove($index) {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function save() {
        $this->validate([
            'title' => 'required|max:100|string|min:3|max:255',
            'options' => 'required|array|min:1|max:10',
            'options.*' => 'required|min:1|max:255'
        ], [
            'options.*.required' => 'The option should not be empty.'
        ]);

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)->map(fn($option) => ['title' => $option])->all()
        );

        $this->dispatch('poll-created');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.poll-create')->layout('layouts.app');
    }
}
