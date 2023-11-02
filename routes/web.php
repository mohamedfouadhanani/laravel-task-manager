<?php

use App\Http\Controllers\ProfileController;
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