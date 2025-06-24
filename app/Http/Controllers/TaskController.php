<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Logic to fetch tasks and return the view
        $tasks = Task::with(['category', 'priority', 'status', 'user', 

        'assignTasks' => function ($query) {
                $query->with(['user', 'assignto']);
            }
        
        ])
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function ($q) use ($search) {
                    $q->where('task_name', 'like', "%{$search}%")
                        ->orWhere('task_description', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
            // dd($tasks);

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
}
