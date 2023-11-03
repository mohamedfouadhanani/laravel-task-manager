<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("profile")->name("profile.")->middleware(["auth", "verified"])->group(function () {
    Route::get("", [ProfileController::class, "index"])->name("index");
    Route::get("edit", [ProfileController::class, "edit"])->name("edit");
});

Route::prefix("tasks")->name("tasks.")->middleware(["auth", "verified"])->group(function () {
    Route::get("/", [TaskController::class, "index"])->name("index");

    Route::get("/create", [TaskController::class, "create"])->name("create");
    Route::post("/", [TaskController::class, "store"])->name("store");

    Route::get("/{task}", [TaskController::class, "show"])->name("show")->middleware('canView');

    Route::get("/{task}/edit", [TaskController::class, "edit"])->name("edit")->middleware('canEdit');
    Route::put("/{task}", [TaskController::class, "update"])->name("update")->middleware('canEdit');

    Route::delete("/{task}", [TaskController::class, "delete"])->name("delete")->middleware('canDelete');

    Route::prefix("/{task}/participants")->name("participants.")->group(function () {
        Route::get("/", [ParticipantController::class, "index"])->name("index");
        Route::get("/create", [ParticipantController::class, "create"])->name("create")->middleware('canDelete');
        Route::post("/include", [ParticipantController::class, "include"])->name("include")->middleware('canDelete');
        Route::delete("/exclude", [ParticipantController::class, "exclude"])->name("exclude")->middleware('canDelete');
    });
});