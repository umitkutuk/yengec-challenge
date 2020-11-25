<?php

namespace App\Http\Controllers;

use App\Events\Customer\CustomerCreated;
use App\Events\Customer\CustomerDeleted;
use App\Events\Customer\CustomerUpdated;
use App\Http\Requests\Customer\CustomerStoreRequest;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use App\Http\Resources\Customer\CustomerCollection;
use App\Http\Resources\Customer\CustomerResource;
use App\Queries\Customer\CustomersQuery;
use App\Services\Customer\CustomerServiceInterface;

class CustomerController extends Controller
{
    /**
     * @var \App\Services\Customer\CustomerServiceInterface
     */
    public CustomerServiceInterface $customerService;

    /**
     * AreaController constructor.
     * @param \App\Services\Customer\CustomerServiceInterface $customerService
     */
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Customer\CustomerCollection
     */
    public function index(): CustomerCollection
    {
        $perPage = request()->filled('per_page') ? request()->input('per_page') : 25;

        $customers = (new CustomersQuery())->paginate($perPage);

        return new CustomerCollection($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Customer\CustomerStoreRequest $request
     * @return \App\Http\Resources\Customer\CustomerResource
     */
    public function store(CustomerStoreRequest $request): CustomerResource
    {
        $data = $request->validated();

        $customer = $this->customerService->createCustomer($data);

        event(new CustomerCreated($customer));

        return new CustomerResource($customer);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Customer\CustomerResource
     */
    public function show($id): CustomerResource
    {
        $customer = $this->customerService->getCustomerById($id);

        return new CustomerResource($customer);
    }

    /**
     * @param \App\Http\Requests\Customer\CustomerUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Customer\CustomerResource
     */
    public function update(CustomerUpdateRequest $request, $id): CustomerResource
    {
        $customer = $this->customerService->updateCustomer($request->validated(), $id);

        event(new CustomerUpdated($customer));

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Customer\CustomerResource
     * @throws \Exception
     */
    public function destroy($id): CustomerResource
    {
        $customer = $this->customerService->destroyCustomer($id);

        event(new CustomerDeleted($customer));

        return new CustomerResource($customer);
    }
}
