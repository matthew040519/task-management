<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::where('active', 1)->get();
        $users = User::all(); // Assuming you have a User model to fetch users
        $status = Status::all(); // Fetch all statuses if needed
        $statusColors = [
            'pending' => 'yellow',
            'ongoing' => 'blue',
            'done' => 'green',
            'cancelled' => 'red',
            'draft' => 'gray',
            'critical' => 'orange',
        ];

        return view('dashboard.index', [
            'tasks' => $tasks,
            'users' => $users,
            'status' => $status,
            'statusColors' => $statusColors,
        ]);
    }

    public function getTaskStatusCounts()
    {
        $tasks = Task::where('active', 1)->get();

        $status = Status::all();

        $result = [];
        foreach ($status as $statusItem) {
            $count = $tasks->where('status_id', $statusItem->id)->count();
            $result[] = [
                'value' => $count,
                'name' => $statusItem->status_name,
            ];
        }

        return response()->json($result);
    }
}
