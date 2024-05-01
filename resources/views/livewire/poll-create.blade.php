<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Poll') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between flex-wrap">
                        <form wire:submit.prevent="save">
                            <div class="card w-96">
                                <input type="text" wire:model.live="title" class="form-input rounded-md w-full" placeholder="Title">
                                @error('title')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2">Title: {{ $title }}</p>

                                <button type="button" wire:click="add" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add Option</button>
                                <div id="options">
                                    @foreach ($options as $index => $option)
                                        <input type="text" class="form-input rounded-md mb-1" wire:model="options.{{ $index }}">
                                        <button type="button" wire:click="remove({{$index}})" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Remove</button>
                                        @error("options.{$index}")
                                            <p class="text-red-600">{{ $message }}</p>
                                        @enderror
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="text-white mt-3 bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 w-full">Save</button>
                        </form>
                        <div>
                            @livewire('list-poll')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
