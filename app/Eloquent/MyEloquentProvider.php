<?php


namespace App\Eloquent;


use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class MyEloquentProvider extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['customers_password'];
        return $this->checkPassword($plain, $user->customers_password);
    }

    /**
     * @Notes: 验证密码是否匹配
     *
     * @param string $plain
     * @param string $password
     * @return bool
     * @Author: dylan
     * @Date: 2021/8/4
     * @Time: 15:39
     */
    public function checkPassword(string $plain, string $password): bool
    {
        if (empty($plain) || empty($password)) {
            return false;
        }

        $stack = explode(':', $password);

        if (md5($stack[1] . $plain) == $stack[0]) {
            return true;
        }
        return false;
    }
}
