<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('user_id', Auth::id())->get();

        return view("categories.index", compact("categories"));
    }

    public function add()
    {
        return view("categories.add");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        Categories::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Added Successfully!');
    }

    public function edit($id)
    {
        $category = Categories::findOrFail($id);

        return view("categories.edit", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully!');
    }
}
