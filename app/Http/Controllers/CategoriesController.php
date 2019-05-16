<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('show_categories', ['categories' => $categories]);
    }
}
