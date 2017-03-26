<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $test = Category::where('user_id', \Auth::user()->id)->get();

        return view('category.category', array('test' => $test));
    }

    public function saveCategory($data)
    {
        $category = app(Category::class);
        $category->fill($data);
        $category->save();

    }
}
