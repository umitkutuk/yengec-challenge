<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface CustomerRepositoryInterface
{
    /**
     * @return \App\Models\Customer
     */
    public function getModel(): Customer;

    /**
     * @return \App\Models\Customer|\Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder();

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return $this
     */
    public function setBuilder(Builder $builder);

    /**
     * Get all of the models from the database.
     *
     * @param string[] $columns
     * @return \App\Models\Customer[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Models\Customer
     */
    public function findOrFail(int $id): Customer;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Customer
     */
    public function create(array $attributes): Customer;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Models\Customer
     */
    public function update(array $attributes, int $id, array $options = []): Customer;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Models\Customer
     * @throws \Exception
     */
    public function destroy(int $id): Customer;
}
