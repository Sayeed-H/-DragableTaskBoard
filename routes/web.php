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


Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');


Route::post('task/store', [TaskController::class, 'store'])->name('task.store');
Route::post('task/update', [TaskController::class, 'update'])->name('task.update');
Route::post('task/delete', [TaskController::class, 'delete'])->name('task.delete');



Route::post('task/setPriority', [TaskController::class, 'setPriority'])->name('task.setPriority');





