<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();

        return view("categories.index", compact("categories"));
    }

    public function add()
    {
        return view("categories.add");
    }
}
