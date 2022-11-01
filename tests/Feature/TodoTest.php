<?php

test('Todo Test', function () {
    \Livewire\Livewire::test(\App\Http\Livewire\Todo::class)
        ->call('add')
        ->assertSet('todo', new \App\Models\Todo());
});
