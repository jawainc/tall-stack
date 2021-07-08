<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{
    public $editedTaskIndex = NULL;
    public $name = "";
    public $tasks = [];

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function render()
    {
        $this->tasks = Task::all()->toArray();
        return view('livewire.tasks', [
            'task_list' => $this->tasks
        ]);
    }

    public function saveTask()
    {
        $validatedData = $this->validate();
        Task::create($validatedData);
        $this->name = "";
        session()->flash('message', 'Successfully created.');
    }

    public function updateTask($index)
    {
        $task = $this->tasks[$index] ?? NULL;
        if($task)
        {
            $editTask = Task::find($task['id']);
            if($editTask)
            {
                $editTask->update($task);
            }
        }

        session()->flash('message', 'Successfully updated.');
        $this->editedTaskIndex = NULL;
    }

    public function setEdit($index)
    {
        $this->editedTaskIndex = $index;
    }
    public function cancelEdit()
    {
        $this->editedTaskIndex = NULL;
    }
}
