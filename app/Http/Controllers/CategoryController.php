<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'email'); // Select only necessary fields
            },
        ])->when(request('filter_name'), function ($query) {
            $query->where('category_name', 'like', '%' . request('filter_name') . '%');
        })->paginate(perPage: 10);

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        try {
            Category::create([
            'category_name' => $request->category_name,
            'created_by' => Auth::user()->id, // Assuming you have user authentication
            ]);

            return redirect()->back()->with('success', 'Category added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add category: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update([
            'category_name' => $request->category_name,
            'created_by' => Auth::user()->id, // Assuming you have user authentication
            ]);

            return redirect()->back()->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update category: ' . $e->getMessage());
        }
    }
}
