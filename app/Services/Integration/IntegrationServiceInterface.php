<?php

namespace App\Services\Integration;

use App\Models\Integration;

interface IntegrationServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Integration
     */
    public function createIntegration(array $data): Integration;

    /**
     * @param int $id
     * @return \App\Models\Integration
     */
    public function getIntegrationById(int $id): Integration;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Models\Integration
     */
    public function updateIntegration(array $data, int $id): Integration;

    /**
     * @param int $id
     * @return \App\Models\Integration
     * @throws \Exception
     */
    public function destroyIntegration(int $id): Integration;
}
