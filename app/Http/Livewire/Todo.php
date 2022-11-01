<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Todo extends Component
{

    public bool $new = false;
    public bool $edit = false;

    public \App\Models\Todo $todo;

    protected $rules = [
        'todo.text' => 'required',
    ];

    public function cancel()
    {
        $this->new = false;
    }

    public function mount()
    {
        $this->todo = new \App\Models\Todo();
    }

    public function add()
    {
        $this->todo = new \App\Models\Todo();
        $this->new = true;
    }

    public function edit($id)
    {
        $this->todo = \App\Models\Todo::find($id);
    }

    public function updated($propertyName, $value)
    {
        $this->validateOnly($propertyName);

        if($this->todo->exists)
        {
            $this->submit();
        }
    }

    public function toggleMark($id)
    {
        $this->todo = \App\Models\Todo::find($id);
        $this->todo->toggleMark();
    }

    public function delete($id)
    {
        \App\Models\Todo::find($id)->delete();
    }

    public function submit()
    {
        $this->validate();
        $this->todo->save();
        $this->new = false;
        $this->edit = false;
        $this->todo = new \App\Models\Todo();
    }

    public function render(): Factory|View|Application
    {
        $todos = \App\Models\Todo::all();
        return view('livewire.todo', compact('todos'));
    }
}
