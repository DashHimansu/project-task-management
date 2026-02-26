<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
});

/*
   Allows users to export task data into an Excel file.
*/

// Export all tasks to Excel
Route::get('/tasks-export', function () {
    return Excel::download(new TasksExport, 'tasks.xlsx');
})->name('tasks.export');
//Authentication Routes
require __DIR__.'/auth.php';
