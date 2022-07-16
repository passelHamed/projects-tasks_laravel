<?php

use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\tasksController;


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

Auth::routes();

Route::resource('/project', projectController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/project/{project}/tasks' , [tasksController::class , 'store']);

Route::patch('/project/{project}/tasks/{tasks}' , [tasksController::class , 'update']);

Route::delete('/project/{project}/tasks/{tasks}' , [tasksController::class , 'destroy']);

Route::get('/profile' , [profileController::class , 'index']);

Route::patch('/profile' , [profileController::class , 'update']);

