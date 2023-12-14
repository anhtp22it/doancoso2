<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.manage-category')
            ->with('categories', $categories);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:category',
            'icon' => 'required|unique:category',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|unique:category,name,'.$request->id,
            'icon' => 'required|unique:category,icon,'.$request->id,
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();
        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
