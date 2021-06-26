<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\AllTasksController;
use App\Http\Controllers\CompletedTasksController;
use App\Http\Controllers\CurrentTasksController;
use App\Http\Controllers\On_holdTasksController;
use App\Http\Controllers\CanceledTasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [TasksController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('tasks', 'App\Http\Controllers\AllTasksController');
Route::middleware(['auth:sanctum', 'verified'])->resource('completed_tasks', 'App\Http\Controllers\CompletedTasksController');
Route::middleware(['auth:sanctum', 'verified'])->resource('current_tasks', 'App\Http\Controllers\CurrentTasksController');
Route::middleware(['auth:sanctum', 'verified'])->resource('on_hold_tasks', 'App\Http\Controllers\On_holdTasksController');
Route::middleware(['auth:sanctum', 'verified'])->resource('canceled_tasks', 'App\Http\Controllers\CanceledTasksController');
