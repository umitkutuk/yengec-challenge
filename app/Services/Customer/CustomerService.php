<?php

namespace App\Services\Customer;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    /**
     * @var \App\Repositories\Customer\CustomerRepositoryInterface
     */
    public $customerRepository;

    /**
     * @param \App\Repositories\Customer\CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @inheritDoc
     */
    public function createCustomer(array $data): Customer
    {
        $customer = $this->customerRepository->create($data);

        return $customer;
    }

    /**
     * @inheritDoc
     */
    public function getCustomerById(int $id): Customer
    {
        return $this->customerRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateCustomer(array $data, int $id): Customer
    {
        $customer = $this->customerRepository->update($data, $id);

        return $customer;
    }

    /**
     * @inheritDoc
     */
    public function destroyCustomer(int $id): Customer
    {
        $customer = $this->customerRepository->destroy($id);

        return $customer;
    }
}
