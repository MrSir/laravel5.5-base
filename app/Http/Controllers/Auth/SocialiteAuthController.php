<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialiteAuthController
 * @package App\Http\Controllers
 */
class SocialiteAuthController extends Controller
{
    /**
     * @param $service
     *
     * @return mixed
     */
    public function redirect($service)
    {
        return Socialite::driver($service)
            ->redirect();
    }

    /**
     * @param $service
     *
     * @return mixed
     */
    public function callback($service)
    {
        $user = Socialite::with($service)
            ->user();

        return view('home')
            ->withDetails($user)
            ->withService($service);
    }
}