<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use App\Pipelines\User\Store;
use Carbon\Carbon;
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
        $socialiteUser = Socialite::with($service)
            ->user();

        $user = User::where(
            'email',
            '=',
            $socialiteUser->email
        )
            ->first();

        if ($user) {
            // update the token
            $token = $user->tokens()
                ->whereType($service)
                ->first();

            if ($token) {
                $token->token = $socialiteUser->token;

                if (!is_null($socialiteUser->expiresIn)) {
                    $token->expires_at = Carbon::now()
                        ->addSeconds($socialiteUser->expiresIn);
                }

                $token->save();
            }
        } elseif (is_null($user)) {
            $data = collect(
                [
                    'name' => $socialiteUser->name,
                    'email' => $socialiteUser->email,
                    'token' => $socialiteUser->token,
                    'service' => $service,
                    'expiresIn' => $socialiteUser->expiresIn
                ]
            );

            // instantiate the pipe
            $pipeline = new Store();
            $pipeline->fill($data);
            // flush the pipe
            $result = $pipeline->flush();
        }

        return view('home')
            ->withDetails($socialiteUser)
            ->withService($service);
    }
}