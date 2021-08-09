<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(int $customers_id)
    {
        $user = User::where('customers_id', $customers_id)->first();
        $this->dispatch(new SendReminderEmail($user));
    }
}
