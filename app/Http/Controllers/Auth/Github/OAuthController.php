<?php

namespace App\Http\Controllers\Auth\Github;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate(
            ['email' => $githubUser->getEmail()],
            [
                'name' => $githubUser->getName(),
                'provider_id' => 'github',
                'provider_user_id' => $githubUser->getId(),
            ]
        );

        Auth::login($user);

        return redirect('/');
    }
}
