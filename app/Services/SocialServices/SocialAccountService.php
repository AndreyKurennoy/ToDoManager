<?php
namespace App\Services\SocialServices;

use App\Models\UserSocialAccount;
use App\User;

/**
 * Created by PhpStorm.
 * User: moga
 * Date: 29.03.17
 * Time: 13:34
 */
class SocialAccountService
{
	public function createOrGetUser($providerObj, $providerName)
	{
		$providerUser = $providerObj->user();

		$account = UserSocialAccount::whereProvider($providerName)->whereProviderUserId($providerUser->getId())->first();

		if($account) {
			return $account->user;
		}
		else
		{
			$account = new UserSocialAccount([
				                                 'provider_user_id' => $providerUser->getId(),
				                                 'provider'         => $providerName,
			                                 ]);

			$user = User::whereEmail($providerUser->getEmail())->first();

			if( !$user ) {
				$user = User::createBySocialProvider($providerUser);
			}

			$account->user()->associate($user);
			$account->save();

			return $user;
		}
	}
}