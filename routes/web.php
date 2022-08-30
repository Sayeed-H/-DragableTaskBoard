<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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



Route::get('/', [ProjectController::class, 'Index'])->name('home');

// Route::resource('projects', ProjectController::class);
// Route::resource('tasks', '\App\Http\Controllers\TaskController');



Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');


Route::post('task/store', [TaskController::class, 'store'])->name('task.store');




