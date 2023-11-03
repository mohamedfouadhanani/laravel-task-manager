<?php

namespace App\Http\Middleware;

use App\Enums\TaskUserRole;
use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // AUTH USER IS EITHER AN ADMIN OR A MODERATOR
        $permitted_user_role = [UserRole::ADMINISTRATOR->value, UserRole::MODERATOR->value];
        if (in_array($request->user()->role->value, $permitted_user_role)) {
            return $next($request);
        }

        // AUTH USER IS AN OWNER, PARTICIPANT OR A VIEWER
        $task = $request->route('task');
        
        $something = $task->users->filter(function ($user) {
            return $user->id === request()->user()->id;
        })->first();

        if ($something == null) {
            return to_route('tasks.index');
        }
        
        $permitted_task_user_roles = [TaskUserRole::OWNER->value, TaskUserRole::PARTICIPANT->value, TaskUserRole::VIEWER->value];

        if (in_array($something->pivot->role, $permitted_task_user_roles)) {
            return $next($request);
        }

        return to_route('tasks.index');
    }
}
