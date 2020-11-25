<?php

namespace App\Http\Controllers;

use App\Events\Integration\IntegrationCreated;
use App\Events\Integration\IntegrationDeleted;
use App\Events\Integration\IntegrationUpdated;
use App\Http\Requests\Integration\IntegrationStoreRequest;
use App\Http\Requests\Integration\IntegrationUpdateRequest;
use App\Http\Resources\Integration\IntegrationCollection;
use App\Http\Resources\Integration\IntegrationResource;
use App\Queries\Integration\IntegrationsQuery;
use App\Services\Integration\IntegrationServiceInterface;

class IntegrationController extends Controller
{
    /**
     * @var \App\Services\Integration\IntegrationServiceInterface
     */
    public $integrationService;

    /**
     * AreaController constructor.
     * @param \App\Services\Integration\IntegrationServiceInterface $integrationService
     */
    public function __construct(IntegrationServiceInterface $integrationService)
    {
        $this->integrationService = $integrationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Integration\IntegrationCollection
     */
    public function index(): IntegrationCollection
    {
        $perPage = request()->filled('per_page') ? request()->input('per_page') : 25;

        $integrations = (new IntegrationsQuery())->paginate($perPage);

        return new IntegrationCollection($integrations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Integration\IntegrationStoreRequest $request
     * @return \App\Http\Resources\Integration\IntegrationResource
     */
    public function store(IntegrationStoreRequest $request): IntegrationResource
    {
        $data = $request->validated();

        $integration = $this->integrationService->createIntegration($data);

        event(new IntegrationCreated($integration));

        return new IntegrationResource($integration);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\Integration\IntegrationResource
     */
    public function show($id): IntegrationResource
    {
        $integration = $this->integrationService->getIntegrationById($id);

        return new IntegrationResource($integration);
    }

    /**
     * @param \App\Http\Requests\Integration\IntegrationUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\Integration\IntegrationResource
     */
    public function update(IntegrationUpdateRequest $request, $id): IntegrationResource
    {
        $integration = $this->integrationService->updateIntegration($request->validated(), $id);

        event(new IntegrationUpdated($integration));

        return new IntegrationResource($integration);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\Integration\IntegrationResource
     * @throws \Exception
     */
    public function destroy($id): IntegrationResource
    {
        $integration = $this->integrationService->destroyIntegration($id);

        event(new IntegrationDeleted($integration));

        return new IntegrationResource($integration);
    }
}
