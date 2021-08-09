<?php


namespace App\Service;

use App\Models\User;

abstract class BaseService
{
    protected object $customerInfo;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->customerInfo = User::where('customers_email_address', 'Dylan.Zhang@feisu.com')->first();
    }

    abstract protected function registerModel();
}
