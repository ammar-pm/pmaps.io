<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function google()
    {
    	return Socialite::driver('google')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user(), "facebook");

        auth()->login($user);

        return redirect()->to('/dashboard');
    }

    public function callbackGoogle(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->user(), "google");

        auth()->login($user);

        return redirect('/dashboard');
    }

}
