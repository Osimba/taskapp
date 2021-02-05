<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * View all tasks
     */
    public function index() {
        return view('index')->with('tasks', Task::orderBy('priority', 'asc')->get());
    }

    /**
     * Store a new task
     * @param Request $request
     */
    public function store(Request $request) {
        $this->validate($request, [
            'description' => ['required', 'max:255'],
            'project' => ['required']
        ]);

        Task::create([
            'description' => $request->description,
            'priority' => Task::count() + 1,
            'project_id' => $request->project
        ]);

        return back()->with('success', 'New task added successfully!');
    }

    /**
     * Update Task description
     * @param Request $request
     * @param Task $task
     */
    public function update(Request $request, Task $task) {
        $this->validate($request, [
            'description' => ['required', 'max:255']
        ]);

        $task->description = $request->description;
        $task->save();

        $request->session()->flash('success', 'Task updated successfully!');

        return response()->json([
            'taskDescription' => $task->description
        ]);
    }

    /**
     * Delete Task 
     * @param Task $task
     */
    public function delete(Task $task) {
        $task->delete();
        request()->session()->flash('success', 'Task deleted successfully!');

        return response()->json();
    }

    /**
     * Update all Task priorities 
     * @param Request $request
     */
    public function updatePriorities(Request $request) {
        foreach ($request->taskIDs as $index => $id) {
            $task = Task::find($id);
            $task->priority = $index + 1;
            $task->save();
        }
       
        return response()->json();
    }
}
