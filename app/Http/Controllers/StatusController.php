<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //
    public function index(Request $request)
    {
        // You can add logic here to fetch data for the status
        // For now, we'll just return a view
        $status = Status::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'email'); // Select only necessary fields
            },
        ]
        )->when(request('filter_name'), function ($query) {
            $query->where('status_name', 'like', '%' . request('filter_name') . '%');
        })->paginate(10);

        return view('status.index', [
            'status' => $status,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        try {
            Status::create([
                'status_name' => $request->status_name,
                'created_by' => auth()->id(), // Assuming you have user authentication
            ]);

            return redirect()->back()->with('success', 'Status added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add status: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $status = Status::findOrFail($id);
            $status->delete();

            return redirect()->back()->with('success', 'Status deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete status: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        try {
            $status = Status::findOrFail($id);
            $status->update([
                'status_name' => $request->status_name,
            ]);

            return redirect()->back()->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update status: ' . $e->getMessage());
        }
    }
}
