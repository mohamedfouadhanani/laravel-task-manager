<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Enums\TaskUserRole;
use App\Http\Requests\TaskFormRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = request()->user()->tasks;
        return view('tasks.index', ['tasks' => $tasks]);
    }
    
    public function show(Task $task) {
        return view('tasks.show', ['task' => $task]);
    }
    
    public function create() {
        $task = new Task();
        $statuses = array_column(TaskStatus::cases(), 'value');

        return view('tasks.form', ['task' => $task, 'statuses' => $statuses]);
    }
    
    public function store(TaskFormRequest $request) {
        $task = new Task();
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->status = $request->get('status');
        
        $task->save();

        $user = request()->user();
        $task->users()->attach($user, ['role' => TaskUserRole::OWNER->value]);
        
        return to_route("tasks.index")->with("success", "task created successfully");
    }
    
    public function edit(Task $task) {
        $statuses = array_column(TaskStatus::cases(), 'value');
        return view('tasks.form', ['task' => $task, 'statuses' => $statuses]);
    }
    
    public function update(TaskFormRequest $request, Task $task) {
        $task->update($request->validated());
        return to_route("tasks.index")->with("success", "task updated successfully");
    }
    
    public function delete(Task $task) {
        $task->delete();
        return to_route("tasks.index")->with("success", "task deleted successfully");
    }
    
}
