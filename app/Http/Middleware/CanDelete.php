<?php

namespace App\Http\Middleware;

use App\Enums\TaskUserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // AUTH USER IS AN OWNER
        $task = $request->route('task');
        
        $something = $task->users->filter(function ($user) {
            return $user->id === request()->user()->id;
        })->first();

        if ($something == null) {
            return to_route('tasks.index');
        }
        
        $permitted_task_user_roles = [TaskUserRole::OWNER->value];
        if (in_array($something->pivot->role, $permitted_task_user_roles)) {
            return $next($request);
        }
        
        return to_route('tasks.index');
    }
}
