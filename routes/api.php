<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/* TASK ROUTES */
Route::get('/tasks', [TaskController::class, 'getTasks']);
Route::get('/task/{id}', [TaskController::class, 'getTaskById']);
Route::post('/task', [TaskController::class, 'storeTask']);
Route::put('/task/{id}', [TaskController::class, 'updateTask']);
Route::delete('/task/{id}', [TaskController::class, 'deleteTask']);
