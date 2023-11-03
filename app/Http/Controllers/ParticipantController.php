<?php

namespace App\Http\Controllers;

use App\Enums\TaskUserRole;
use App\Http\Requests\ParticipantFormRequest;
use App\Models\Task;
use App\Models\User;

class ParticipantController extends Controller
{
    public function index(Task $task) {
        return view('tasks.participants.index', ['task' => $task]);
    }

    public function create(Task $task) {
        $roles = [TaskUserRole::PARTICIPANT->value, TaskUserRole::VIEWER->value];
        return view('tasks.participants.form', ['task' => $task, 'roles' => $roles]);
    }

    public function include(ParticipantFormRequest $request, Task $task) {
        $request_email = $request->get('email');
        $form_user = User::where('email', $request_email)->first();

        $request_role = $request->get('role');

        $task->users()->attach($form_user->id, ['role' => $request_role]);
        return to_route("tasks.participants.index", $task)->with("success", "user included successfully");
    }

    public function exclude(ParticipantFormRequest $request, Task $task) {
        $request_email = $request->get('email');
        $form_user = User::where('email', $request_email)->first();

        $task->users()->detach($form_user->id);
        return to_route("tasks.participants.index", $task)->with("success", "user excluded successfully");
    }
}
