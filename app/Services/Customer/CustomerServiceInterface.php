<?php

namespace App\Services\Customer;

use App\Models\Customer;

interface CustomerServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Customer
     */
    public function createCustomer(array $data): Customer;

    /**
     * @param int $id
     * @return \App\Models\Customer
     */
    public function getCustomerById(int $id): Customer;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Models\Customer
     */
    public function updateCustomer(array $data, int $id): Customer;

    /**
     * @param int $id
     * @return \App\Models\Customer
     * @throws \Exception
     */
    public function destroyCustomer(int $id): Customer;
}
