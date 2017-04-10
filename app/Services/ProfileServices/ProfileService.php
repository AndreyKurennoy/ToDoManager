<?php
/**
 * Created by PhpStorm.
 * User: 19ofi
 * Date: 10.04.2017
 * Time: 20:42
 */
namespace App\Services\ProfileServices;

use App\Models\UserProfile;



class ProfileService
{
    public function getUserProfile()
    {
        return UserProfile::where('user_id', \Auth::user()->id)->get();
    }
}
