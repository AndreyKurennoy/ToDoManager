<?php
namespace App\Http\Controllers;

use App\Http\Requests\CalendarRequest;
use App\Services\CalendarServices\CalendarService;
use App\Services\SocialServices\SocialAccountService;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

//use Laravel\Socialite\Facades\Socialite;

/**
 * Class CalendarController
 * @package App\Http\Controllers
 */
class SocialController extends Controller
{
	/**
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function login($provider)
	{
		return Socialite::with($provider)->redirect();
	}

	/**
	 * @param SocialAccountService $service
	 * @param                      $provider
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function callback(SocialAccountService $service, $provider)
	{
		$driver   = Socialite::driver($provider);
		$user = $service->createOrGetUser($driver, $provider);
		\Auth::login($user, true);
		return redirect()->intended('/');

	}
}

