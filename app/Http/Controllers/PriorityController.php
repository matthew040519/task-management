<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    //
    public function index()
    {
        // You can add logic here to fetch data for the priority list
        // For now, we'll just return a view
        $priorities = Priority::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'email'); // Select only necessary fields
            },
        ])
        ->when(request('filter_name'), function ($query) {
            $query->where('priority_name', 'like', '%' . request('filter_name') . '%');
        })->paginate(10);

        return view('priority.index', [
            'priorities' => $priorities,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'priority_name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Assuming color is a hex code
        ]);

        try {

            Priority::create([
            'priority_name' => $request->priority_name,
            'color' => $request->color,
            'created_by' => auth()->id(), // Assuming you have user authentication
            ]);

            return redirect()->back()->with('success', 'Priority added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add priority: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $priority = Priority::findOrFail($id);
            $priority->delete();

            return redirect()->back()->with('success', 'Priority deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete priority: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'priority_name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Assuming color is a hex code
        ]);

        try {
            $priority = Priority::findOrFail($id);
            $priority->update([
                'priority_name' => $request->priority_name,
                'color' => $request->color,
            ]);

            return redirect()->back()->with('success', 'Priority updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update priority: ' . $e->getMessage());
        }
    }
}
