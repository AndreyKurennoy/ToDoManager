<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
        $categories = $this->categoryService->getCategories();
        return view('category.category', array('categories' => $categories));
    }


    public function store(CategoryRequest $request)
    {
        $save = $this->categoryService->saveTask($request->all());

        return \Response::json($save);
    }

}
