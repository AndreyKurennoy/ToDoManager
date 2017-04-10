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
    /**
     * Получение всех категорий для текущего пользователя
     *
     * @return mixed
     */
    public function getCategories()
    {
        return Category::where('user_id', \Auth::user()->id)->get();
    }

    /**
     * Сохранение новой категории
     *
     * @param $data
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function saveTask($data)
    {

        $category = app(Category::class);
        $category->fill($data);
        $category->user_id = \Auth::user()->id;
        $category->created_at = time();
        $category->save();

        return $category;
    }

    /**
     * Получение определенной категории
     *
     * @param $id
     *
     * @return mixed
     */
    public function getCategory($category_id)
    {
        return Category::where('id', $category_id)->value('color');
    }


}