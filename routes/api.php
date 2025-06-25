<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function () {
    Route::get('/test', function (Request $request) {
        return response()->json(['message' => 'API is working']);
    })->name('test');

Route::middleware(['auth:sanctum'])->group(function () {
        
        Route::get('/dashboard/task-status-counts', [DashboardController::class, 'getTaskStatusCounts'])->name('dashboard.taskStatusCounts');

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::post('/add', [CategoryController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        });

        Route::prefix('priority')->name('priority.')->group(function () {
            Route::get('/', [PriorityController::class, 'index'])->name('index');
            Route::post('/add', [PriorityController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [PriorityController::class, 'destroy'])->name('destroy');
            Route::put('/update/{id}', [PriorityController::class, 'update'])->name('update');
        });

        Route::prefix('status')->name('status.')->group(function () {
            Route::get('/', [StatusController::class, 'index'])->name('index');
            Route::post('/add', [StatusController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [StatusController::class, 'destroy'])->name('destroy');
            Route::put('/update/{id}', [StatusController::class, 'update'])->name('update');
        });

        Route::prefix('tasks')->name('tasks.')->group(function () {
            Route::get('/', [TaskController::class, 'index'])->name('index');
            Route::post('/add', [TaskController::class, 'store'])->name('store');
        });

    });

 });    
