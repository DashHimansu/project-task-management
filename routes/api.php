<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;


//It's just for checking
Route::get('/test', function () {
    return response()->json([
        'message' => 'api working'
    ]);
});
/*
--------------------------------------------------------------------------
 Project APIs
--------------------------------------------------------------------------
 These routes handle project-related data retrieval.
They return JSON responses and are used for API access.
*/

// Fetch all projects along with their task count
Route::get('/projects', [ProjectController::class, 'index']);


/*
--------------------------------------------------------------------------
 Task APIs
--------------------------------------------------------------------------
 These routes manage task-related operations such as
 listing tasks, filtering by project, and updating status.
*/

// Get all tasks with project details
Route::get('/tasks', [TaskController::class, 'index']);

// Get tasks belonging to a specific project
Route::get('/tasks/project/{id}', [TaskController::class, 'getByProject']);

// Update the status of a specific task
Route::patch('/tasks/{id}/status', [TaskController::class, 'updateStatus']);
