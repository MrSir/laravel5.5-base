<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Token;
use App\Models\User;

class UserProvider extends EloquentUserProvider
{
    /**
     * @const MAX_LOGIN_ATTEMPTS signifies the max number of login attempts
     */
    const MAX_LOGIN_ATTEMPTS = 4;

    /**
     * Return the user by their ID and remember me token.
     *
     * @param mixed  $identifier
     * @param string $tokenValue
     *
     * @return bool|MorphTo|null
     */
    public function retrieveByToken($identifier, $tokenValue)
    {
        // make sure token is present and valid
        if (!isset($tokenValue) || !is_string($tokenValue)) {
            return false;
        }

        // attempt to load token
        $token = Token::whereToken($tokenValue)->first();

        if ($token) {
            // send back user associated with token
            return $token->user;
        }

        return null;
    }

    /**
     * Return the user based on the given credentials.
     *
     * @param array $credentials
     *
     * @return bool|null|User
     */
    public function retrieveByCredentials(array $credentials)
    {
        $user = User::whereEmail($credentials['email'])->first();

        if ($user) {
            return $user;
        }

        return null;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $id
     *
     * @return bool|null|User
     */
    public function retrieveById($id)
    {
        $user = null;

        if (!isset($id) || empty($id)) {
            return false;
        }

        $user = User::find($id);

        if ($user) {
            return $user;
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param Authenticatable $user
     * @param array           $credentials
     *
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];

        $password = $user->getAuthPassword();

        if ($password) {
            $condition1 = $this->hasher->check(
                $plain,
                $password
            );

            if ($condition1) {
                return true;
            }

            return false;
        }

        return false;
    }
}