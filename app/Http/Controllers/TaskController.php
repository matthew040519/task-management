<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignTask;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        // Logic to fetch tasks and return the view
        $tasks = Task::with(['category', 'priority', 'status', 'user', 

        'assignTasks' => function ($query) {
                $query->with(['user', 'assignto']);
            }, 'comments' => function ($query) {
                $query->with('user');
            }])
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function ($q) use ($search) {
                    $q->where('task_name', 'like', "%{$search}%")
                        ->orWhere('task_description', 'like', "%{$search}%");
                });
            })
            ->when(request('priority'), function ($query) {
                $query->where('priority_id', request('priority'));
            })
            ->when(request('status'), function ($query) {
                $query->where('status_id', request('status'));
            })
            ->where('active', 1) // active tasks
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $category = Category::all();
        $priorities = Priority::all();
        $users = User::all();
        $status = Status::all();
            // dd($tasks);

        return view('tasks.index', [
            'tasks' => $tasks,
            'categories' => $category,
            'priorities' => $priorities,
            'users' => $users,
            'status' => $status,
        ]);
    }

    public function store(Request $request)
    {
        // Logic to store a new task
        $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority_id' => 'required|exists:tblpriorities,id',
            'category_id' => 'required|exists:tblcategories,id',
        ]);


        try {
            $task = Task::create([
                'task_name' => $request->task_name,
                'task_description' => $request->task_description,
                'due_date' => $request->due_date,
                'priority_id' => $request->priority_id,
                'category_id' => $request->category_id,
                'status_id' => 1,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                if (!Storage::disk('public')->exists('attachments')) {
                   Storage::disk('public')->makeDirectory('attachments');
                }
                $path = $file->storeAs('attachments', $filename, 'public');
                $task->file_name = $filename;
                $task->save();
            }

            foreach ($request->assigned_to as $userId) {
                AssignTask::create([
                    'task_id' => $task->id,
                    'user_id' => $userId,
                    'assigned_by' => Auth::user()->id,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Task created successfully.',
                'task' => $task
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }

        
    }

    public function comments(Request $request, $id)
    {
        // Logic to handle comments on a task
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        try {
            $task = Task::findOrFail($id);
            $task->comments()->create([
                'user_id' => Auth::id(),
                'comment_text' => $request->comment,
                'created_by' => Auth::user()->id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Comment added successfully.',
                'task' => $task
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        // Logic to update the status of a task
        $request->validate([
            'status_id' => 'required|exists:tblstatus,id',
        ]);

        try {
            $task = Task::findOrFail($id);
            $task->status_id = $request->status_id;
            $task->updated_by = Auth::user()->id;
            $task->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Task status updated successfully.',
                'task' => $task
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        // Logic to inactive a task
        try {
            $task = Task::findOrFail($id);
            if ($task->file_name) {
                Storage::disk('public')->delete('attachments/' . $task->file_name);
            }
            $task->active = 0;
            $task->updated_by = Auth::user()->id;
            $task->save();

             return redirect()->back()->with('success', 'Task updated successfully.');

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Task inactivated successfully.'
            // ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing task
        $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority_id' => 'required|exists:tblpriorities,id',
            'category_id' => 'required|exists:tblcategories,id',
        ]);

        try {
            $task = Task::findOrFail($id);
            $task->task_name = $request->task_name;
            $task->task_description = $request->task_description;
            $task->due_date = $request->due_date;
            $task->priority_id = $request->priority_id;
            $task->category_id = $request->category_id;
            $task->updated_by = Auth::user()->id;
            $task->save();
            // Handle file upload
            if ($request->hasFile('file')) {    
                if ($task->file_name) {
                    Storage::disk('public')->delete('attachments/' . $task->file_name);
                }
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                if (!Storage::disk('public')->exists('attachments')) {
                    Storage::disk('public')->makeDirectory('attachments');
                }
                $path = $file->storeAs('attachments', $filename, 'public');
                $task->file_name = $filename;
                $task->save();
            } 

            // Update assigned users
            $task->assignTasks()->delete();
            if ($request->assigned_to) {
                foreach ($request->assigned_to as $userId) {
                    $task->assignTasks()->create([
                        'user_id' => $userId,
                        'task_id' => $task->id,
                        'assigned_by' => Auth::user()->id,
                    ]);
                }
            }

           

            return response()->json([
                'status' => 'success',
                'message' => 'Task updated successfully.',
                'task' => $task
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
