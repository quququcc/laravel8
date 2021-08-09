<?php

namespace App\Service\User;

use App\Service\BaseService;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function registerModel()
    {
        // TODO: Implement registerModel() method.
    }

    public function login(string $email, string $password): bool
    {

    }
}
