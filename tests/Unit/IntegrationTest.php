<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\IntegrationType;
use App\Services\Integration\IntegrationServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected $integrationService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->integrationService = $this->app->make(IntegrationServiceInterface::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        //Factory den alınmalıdır.
        $customer = Customer::create([
            'name' => 'Test' . random_int(1, 1000),
            'email' => 'test@' . random_int(100000, 999999).'.test'
        ]);

        $integrationTypeId = IntegrationType::inRandomOrder()->first();

        $integration = $this->integrationService->createIntegration([
            'integration_type_id' => $integrationTypeId->id,
            'customer_id' => $customer->id,
            'username' => 'Test' . random_int(1, 1000),
            'passport' => random_int(100000, 999999)
        ]);

        $this->assertDatabaseHas('integrations', [ 'id' => $integration->id]);
    }
}
