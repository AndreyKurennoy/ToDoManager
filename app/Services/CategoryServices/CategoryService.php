<?php
/**
 * Created by PhpStorm.
 * User: 19ofi
 * Date: 03.04.2017
 * Time: 9:25
 */
namespace App\Services\CategoryServices;

use App\Models\Category;

class CategoryService
{

    public function getCategories()
    {
        return Category::where('user_id', \Auth::user()->id)->get();
    }

    public function saveTask($data)
    {

        $category = app(Category::class);
        $category->fill($data);
        $category->user_id = \Auth::user()->id;
        $category->created_at = time();
        $category->save();

        return $category;
    }



}