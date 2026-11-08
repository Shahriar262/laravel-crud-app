<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
     public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'nullable|string|max:500',
                'priority' => 'required|string|in:Low,Medium,High',
                'status' => 'required|string|in:Pending,In Progress,Completed,Hold',
                'due_date' => 'nullable|date'
            ]);
            Task::create($validated);
            return redirect('/tasks/create')
            ->with('success', 'Task created successfully!');
        }

    public function index()
        {
            $tasks = Task::all();

            return view('tasks.index', compact('tasks'));
        }

    public function edit(Task $task)
        {
            return view('tasks.edit', compact('task'));
        }

    public function update(Request $request, Task $task)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'nullable|string|max:500',
                'priority' => 'required|string|in:Low,Medium,High',
                'status' => 'required|string|in:Pending,In Progress,Completed,Hold',
                'due_date' => 'nullable|date'
            ]);

            $task->update($validated);

            return redirect('/')
                ->with('success', 'Task updated successfully!');
        } 
        
    public function destroy(Task $task)
        {
            $task->delete();

            return redirect('/')
                ->with('success', 'Task deleted successfully!');
        }    
}
