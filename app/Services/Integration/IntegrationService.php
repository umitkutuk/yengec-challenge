<?php

namespace App\Services\Integration;

use App\Models\Integration;
use App\Repositories\Integration\IntegrationRepositoryInterface;

class IntegrationService implements IntegrationServiceInterface
{
    /**
     * @var \App\Repositories\Integration\IntegrationRepositoryInterface
     */
    public IntegrationRepositoryInterface $integrationRepository;

    /**
     * @param \App\Repositories\Integration\IntegrationRepositoryInterface $integrationRepository
     */
    public function __construct(IntegrationRepositoryInterface $integrationRepository)
    {
        $this->integrationRepository = $integrationRepository;
    }

    /**
     * @inheritDoc
     */
    public function createIntegration(array $data): Integration
    {
        $integration = $this->integrationRepository->create($data);

        return $integration;
    }

    /**
     * @inheritDoc
     */
    public function getIntegrationById(int $id): Integration
    {
        return $this->integrationRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateIntegration(array $data, int $id): Integration
    {
        $integration = $this->integrationRepository->update($data, $id);

        return $integration;
    }

    /**
     * @inheritDoc
     */
    public function destroyIntegration(int $id): Integration
    {
        $integration = $this->integrationRepository->destroy($id);

        return $integration;
    }
}
