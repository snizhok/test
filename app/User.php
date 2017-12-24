<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{
    private $id;
    private $username;
    private $password;
    private $name;

    public function __construct($attributes)
    {
        $this->id = $attributes['id'];
        $this->username = $attributes['username'];
        $this->password = \Hash::make($attributes['password']);
        $this->name = $attributes['name'];
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new \ErrorException('Undefined property: App\User::$' . $name);
    }

    public static function findByField($field = 'id', $value)
    {
        $users = config('users.list');
        $attributes = array_filter($users, function ($user) use ($field, $value) {
            return $user[$field] == $value;
        });
        if (is_array($attributes)) {
            return new self(array_shift($attributes));
        }
        return null;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {

    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return;
    }
}