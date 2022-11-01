<div class="flex items-start justify-center h-screen w-full bg-gray-200">
    {{-- Be like water. --}}
    <div class="bg-white shadow-md rounded-md mt-20 w-full max-w-sm flex flex-col items-start justify-start">
        <form wire:submit="submit" class="w-full flex items-center justify-end p-5 space-x-5">
            @if($new)
                <input type="text" wire:model.lazy="todo.text"
                       class="w-full h-full focus:outline-none border-b border-blue-600">
            @endif
            @if(!$new)
                <a wire:click.prevent="add" class="px-2 py-1 bg-blue-500 hover:bg-blue-700 text-white">add</a>
            @endif
            @if($new)
                <a href="" wire:click.prevent="cancel"
                   class="px-2 py-1 bg-blue-500 hover:bg-blue-700 text-white">cancel</a>
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
                        <button>mark</button>
                        <button wire:click.prevent="edit('{{ $td->id }}')">edit</button>
                        <button wire:click.prevent="delete('{{ $td->id }}')">delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
