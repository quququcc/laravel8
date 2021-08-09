<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(UserService $service, UserRequest $request): JsonResponse
    {
        $email = $request->input('customers_email_address', '');
        $password = $request->input('customers_password', '');
        $service->login($email, $password);
    }
}
