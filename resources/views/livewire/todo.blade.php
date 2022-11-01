<div class="flex items-start justify-center h-screen w-full bg-gray-200">
    {{-- Be like water. --}}
    <div class="bg-white shadow-md rounded-md mt-20 w-full max-w-sm flex flex-col items-start justify-start">
        <form wire:submit="submit" class="w-full flex items-center justify-end p-5 space-x-5">
            @if($new)
                <input type="text" wire:model.lazy="todo.text"
                       class="w-full h-full focus:outline-none border-b border-blue-600">
            @endif
            @if(!$new)
                <a wire:click.prevent="add" class="px-2 py-1 bg-blue-500 hover:bg-blue-700 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                </a>
            @endif
            @if($new)
                <a href="" wire:click.prevent="cancel"
                   class="px-2 py-1 bg-blue-500 hover:bg-blue-700 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </a>
            @endif
        </form>
        <div class="w-full">
            @foreach($todos as $td)
                <div class="flex items-center justify-start odd:bg-gray-200 text-black">
                    <div class="flex-none px-2">
                        <input type="checkbox"/>
                    </div>
                    <div class="flex-grow h-12 flex items-center justify-start w-full">
                        @if($td->id === $todo->id)
                        <form class="w-full" wire:submit="submit">
                            <input type="text" wire:model.lazy="todo.text"
                                   class="w-full h-full px-3 py-2 focus:outline-none border border-blue-500"/>
                        </form>
                        @endif
                        @if(!($td->id === $todo->id))
                            <span class="w-full h-full px-3 py-2 inline-block">{{ $td->text }}</span>
                        @endif
                    </div>
                    <div class="flex-none px-2">
                        <button wire:click.prevent="toggleMark('{{ $td->id }}')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                        <button wire:click.prevent="edit('{{ $td->id }}')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button wire:click.prevent="delete('{{ $td->id }}')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
