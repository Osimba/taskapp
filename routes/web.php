<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TaskController::class, 'index'])->name('home');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/tasks/priority', [TaskController::class, 'updatePriorities'])->name('tasks.update.priority');
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}/delete', [TaskController::class, 'delete'])->name('tasks.delete');

Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('project');