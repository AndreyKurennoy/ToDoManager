<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'name',
        'last_name',
        'gender',
        'country'
    ];

//    public function getUserProfile()
//    {   dd($this);
//        return $this->name;
//    }
}
