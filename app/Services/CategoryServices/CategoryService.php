<?php
/**
 * Created by PhpStorm.
 * User: 19ofi
 * Date: 03.04.2017
 * Time: 9:25
 */
namespace App\Services\CategoryServices;

use App\Models\Category;
use \MaddHatter\LaravelFullcalendar\Facades\Calendar as FacadeCalendar;
use MaddHatter\LaravelFullcalendar\Calendar;
use \Carbon\Carbon;
class CategoryService
{

    public function getCategories()
    {
        return Category::where('user_id', \Auth::user()->id)->get();
    }

    public function saveTask($data)
    {
//        dd($data);
        $category = app(Category::class);
        $category->fill($data);
        $category->user_id = \Auth::user()->id;
        $category->save();

        return $category;
    }

}