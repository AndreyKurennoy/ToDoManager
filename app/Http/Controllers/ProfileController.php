<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProfileServices\ProfileService;

class ProfileController extends Controller
{
    public $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService=$profileService;
    }


    public function index()
    {
        $userProfile = $this->profileService->getUserProfile();
//        dd($userProfile);
        return view('user_profile', ['userProfile' => $userProfile]);
    }


}
