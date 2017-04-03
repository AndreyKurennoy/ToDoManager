<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryServices\CategoryService;

class CategoryController extends Controller
{
    public $categoryService;


    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }



    public function index()
    {

        $test = Category::where('user_id', \Auth::user()->id)->get();

        return view('category.category', array('test' => $test));
    }

//    public function saveCategory($data)
//    {
//        $category = app(Category::class);
//        $category->fill($data);
//        $category->save();
//
//    }

    public function store(CategoryRequest $request)
    {
        $save = $this->categoryService->saveTask($request->all());

        return \Response::json($save);
    }
}
