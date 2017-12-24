<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider as UserProviderContract;

class UserProvider implements UserProviderContract
{
    public function retrieveById($identifier)
    {
        return User::findByField('id', $identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        return;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    public function retrieveByCredentials(array $credentials)
    {
        if (!count($credentials)) {
            return;
        }
        return User::findByField('username', $credentials['username']);
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return \Hash::check($credentials['password'], $user->getAuthPassword());
    }
}
