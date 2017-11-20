<?php

namespace App\Services;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use App\Models\Token;

class AuthGuard implements StatefulGuard
{
    /**
     * @var Token
     */
    protected $token;

    /**
     * Create a new authentication guard.
     *
     * @param UserProvider $provider
     * @param Request      $request
     */
    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
    }

    public function loginUsingToken($token)
    {
        $tokenObject = Token::findValid($token);

        if (empty($tokenObject)) {
            return 422;
        }

        $user = $tokenObject->tokenable;

        if (empty($user)) {
            return 422;
        }

        $this->setUser($user);

        return $token;
    }

    /**
     * Get the currently authenticated user.
     * @return Authenticatable|null
     */
    public function user()
    {
        if (isset($this->user)) {
            return $this->user;
        } else {
            $tokenValue = $this->getTokenForRequest();

            if (!empty($tokenValue) && is_string($tokenValue)) {
                $this->user = $this->provider->retrieveByToken(
                    null,
                    $tokenValue
                );
            } else {
                $this->user = null;
            }

            return $this->user;
        }
    }

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Validate a user's credentials.
     *
     * @param array $credentials
     *
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        $this->user = $this->provider->retrieveByCredentials($credentials);

        return $this->provider->validateCredentials(
            $this->user(),
            $credentials
        );
    }

    /**
     * @param Token $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param array $credentials
     * @param bool  $remember
     * @param bool  $login
     *
     * @return array
     */
    public function attempt(array $credentials = [], $remember = true, $login = true)
    {
        $user = $this->provider->retrieveByCredentials($credentials);

        if ($user) {
            // validate the credentials and log the user in
            if ($this->validate($credentials)) {
                if ($login) {
                    $this->login(
                        $user,
                        $remember
                    );
                }

                return [
                    'code' => 200,
                    'data' => 'HTTP_OK',
                ];
            } else {
                return [
                    'code' => 423,
                    'data' => 'HTTP_LOCKED',
                ];
            }
        } else {
            return [
                'code' => 422,
                'data' => 'HTTP_LOCKED',
            ];
        }
    }

    /**
     * @return UserProvider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param array $credentials
     *
     * @return array
     */
    public function once(array $credentials = [])
    {
        return $this->attempt($credentials);
    }

    /**
     * @param UserProvider $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Log a user into the application.
     *
     * @param Authenticatable $user
     * @param bool            $remember
     */
    public function login(Authenticatable $user, $remember = true)
    {
        // generate a new token for the user
        $this->setUser($user);
    }

    /**
     * Log the given user ID into the application.
     *
     * @param mixed $id
     * @param bool  $remember
     *
     * @return int
     */
    public function loginUsingId($id, $remember = false)
    {
        // check the resource
        $user = $this->provider->retrieveById($id);

        if ($user) {
            $this->setUser($user);

            return 200; // HTTP_OK
        } else {
            return 422; // HTTP_UNPROCESSABLE_ENTITY
        }
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param mixed $id
     *
     * @return bool
     */
    public function onceUsingId($id)
    {
        // TODO: Implement onceUsingId() method.
    }

    /**
     * Determine if the user was authenticated via "remember me" cookie.
     * @return bool
     */
    public function viaRemember()
    {
        // TODO: Implement viaRemember() method.
    }

    /**
     * Log the user out of the application.
     */
    public function logout()
    {
        // TODO: Implement logout() method.
    }

    /**
     * Get the token for the current request.
     * @return string
     */
    protected function getTokenForRequest()
    {
        $token = \Request::header(
            'authorization',
            \Request::input('authorization')
        );

        if (empty($token)) {
            $token = $this->request->bearerToken();
        }

        if (empty($token)) {
            $token = $this->request->getPassword();
        }

        return $token;
    }

    /**
     * Determine if the current user is authenticated.
     * @return bool
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * Determine if the current user is a guest.
     * @return bool
     */
    public function guest()
    {
        // TODO: Implement guest() method.
    }

    /**
     * Get the ID for the currently authenticated user.
     * @return int|null
     */
    public function id()
    {
        // TODO: Implement id() method.
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        // TODO: Implement setUser() method.
    }
}