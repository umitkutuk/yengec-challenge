<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
interface UserRepositoryInterface
{
    /**
     * @return \App\Models\User
     */
    public function getModel(): User;

    /**
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder
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
     * @return \App\Models\User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param int $id
     * @return \App\Models\User
     */
    public function findOrFail(int $id): User;

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\User
     */
    public function create(array $attributes): User;

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @param array $options
     * @return \App\Models\User
     */
    public function update(array $attributes, int $id, array $options = []): User;

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Models\User
     * @throws \Exception
     */
    public function destroy(int $id): User;

    /**
     * @param string $userName
     ** @return \App\Models\User
     */
    public function findByUserName(string $userName): User;
}
