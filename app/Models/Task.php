<?php

namespace App\Models;

use App\Enums\TaskStatus;
use App\Enums\TaskUserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = ["title", "description", "status"];

    protected $cast = [
        "status" => TaskStatus::class,
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function owner() {
        $owner = $this->users->filter(function ($user) {
            return $user->pivot->role == TaskUserRole::OWNER->value;
        })->first();

        return $owner;
    }
}
