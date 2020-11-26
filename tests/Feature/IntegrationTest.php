<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Integration;
use App\Models\IntegrationType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     * @throws \Exception
     */
    public function testIntegrationCreateCommand()
    {
        //Factory den alınmalıdır.
        $customer = Customer::create([
            'name' => 'Test' . random_int(1, 1000),
            'email' => 'test@' . random_int(100000, 999999).'.test'
        ]);

        $integrationTypeId = IntegrationType::inRandomOrder()->first();

        $this->artisan('integration:create', [
            'integration_type_id' => $integrationTypeId->id,
            'customer_id' => $customer->id,
            'username' => 'Test' . random_int(1, 1000),
            'passport' => random_int(100000, 999999)
        ])
            ->assertExitCode(0);

    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIntegrationUpdateCommand()
    {
        //Factory den alınmalıdır.
        $customer = Customer::create([
            'name' => 'Test' . random_int(1, 1000),
            'email' => 'test@' . random_int(100000, 999999).'.test'
        ]);

        $integrationTypeId = IntegrationType::inRandomOrder()->first();

        //Factory den alınmalıdır.
        $integration = Integration::create([
            'integration_type_id' => $integrationTypeId->id,
            'customer_id' => $customer->id,
            'username' => 'Test' . random_int(1, 1000),
            'passport' => random_int(100000, 999999)
        ]);

        $this->artisan('integration:update', [
            'id' => $integration->id,
            'integration_type_id' => $integrationTypeId->id,
            'customer_id' => $customer->id,
            'username' => 'Test' . random_int(1, 1000),
            'passport' => random_int(100000, 999999)
        ])
            ->assertExitCode(0);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIntegrationDeleteCommand()
    {
        //Factory den alınmalıdır.
        $customer = Customer::create([
            'name' => 'Test' . random_int(1, 1000),
            'email' => 'test@' . random_int(100000, 999999).'.test'
        ]);

        $integrationTypeId = IntegrationType::inRandomOrder()->first();

        //Factory den alınmalıdır.
        $integration = Integration::create([
            'integration_type_id' => $integrationTypeId->id,
            'customer_id' => $customer->id,
            'username' => 'Test' . random_int(1, 1000),
            'passport' => random_int(100000, 999999)
        ]);

        $this->artisan('integration:delete', [
            'id' => $integration->id,
        ])
            ->assertExitCode(0);
    }
}
