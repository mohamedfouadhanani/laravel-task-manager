<?php

namespace App\Models;

use App\Enums\TaskStatus;
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
}
