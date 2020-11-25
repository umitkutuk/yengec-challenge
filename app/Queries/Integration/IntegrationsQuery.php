<?php

namespace App\Queries\Integration;

use App\Repositories\Integration\IntegrationRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IntegrationsQuery extends QueryBuilder
{
    public function __construct(?Request $request = null)
    {
        // Resolve services, repositories etc. here...
        // $userService = resolve(UserServiceInterface::class);
        $integrationRepository = resolve(IntegrationRepositoryInterface::class);

        $builder = $integrationRepository->getBuilder()
            ->with([
                'integrationType',
                'customer'
            ]);

        parent::__construct($builder, $request);

        // Put your filters, sorts etc. here:
        // $this->allowedFilters(...
        $this
            ->allowedSorts([
                'created_at'
            ])->allowedFilters([
                AllowedFilter::exact('id'),
            ]);
    }
}
