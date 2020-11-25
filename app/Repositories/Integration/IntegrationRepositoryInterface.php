<?php

namespace App\Repositories\Integration;

use App\Models\Integration;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface IntegrationRepositoryInterface
{
    /**
     * @return \App\Models\Integration
     */
    public function getModel(): Integration;

    /**
     * @return \App\Models\Integration|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Models\Integration[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Models\Integration
     */
    public function findOrFail(int $id): Integration;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Integration
     */
    public function create(array $attributes): Integration;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Models\Integration
     */
    public function update(array $attributes, int $id, array $options = []): Integration;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Models\Integration
     * @throws \Exception
     */
    public function destroy(int $id): Integration;
}
