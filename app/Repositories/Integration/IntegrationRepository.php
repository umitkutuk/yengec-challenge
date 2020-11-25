<?php

namespace App\Repositories\Integration;

use App\Models\Integration;
use Illuminate\Database\Eloquent\Builder;

/**
 * @see \App\Providers\AppServiceProvider::repositoryBindings();
 */
class IntegrationRepository implements IntegrationRepositoryInterface
{
    /**
     * @var \App\Integration|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Integration
     */
    protected $model;

    public function __construct(Integration $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): Integration
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function getBuilder()
    {
        return $this->builder = $this->getModel()::query();
    }

    /**
     * @inheritDoc
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function all($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail(int $id): Integration
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): Integration
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): Integration
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): Integration
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }
}
