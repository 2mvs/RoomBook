<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function allCategories(): View
    {
        return view('category.index', [
            'categories' => Category::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function showCategoryForm(): View
    {
        return view('category.add');
    }

    public function createCategory(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }
}
