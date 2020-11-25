<?php

namespace App\Console\Commands\Integration;

use App\Models\Customer;
use App\Models\Integration;
use App\Models\IntegrationType;
use App\Services\Integration\IntegrationServiceInterface;
use Illuminate\Console\Command;

class UpdateIntegration extends Command
{
    /**
     * @var \App\Services\Integration\IntegrationServiceInterface
     */
    public IntegrationServiceInterface $integrationService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration:update {id} {integration_type_id} {customer_id} {username} {passport}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @param \App\Services\Integration\IntegrationServiceInterface $integrationService
     */
    public function __construct(IntegrationServiceInterface $integrationService)
    {
        parent::__construct();
        $this->integrationService = $integrationService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Burayı servisten almalıydım.
        $IntegrationExists = Integration::where('id', $this->argument('id'))->exists();
        if (!$IntegrationExists) {
            $this->error('Integration not exists!');
            return null;
        }

        //Burayı servisten almalıydım.
        $customerExists = Customer::where('id', $this->argument('customer_id'))->exists();
        if (!$customerExists) {
            $this->error('Customer not exists!');
            return null;
        }

        //Burayı servisten almalıydım.
        $customerExists = IntegrationType::where('id', $this->argument('integration_type_id'))->exists();
        if (!$customerExists) {
            $this->error('Integration Type not exists!');
            return null;
        }

        $this->integrationService->updateIntegration([
            'integration_type_id' => $this->argument('integration_type_id'),
            'customer_id' => $this->argument('customer_id'),
            'username' => $this->argument('username'),
            'passport' => $this->argument('passport'),
        ],
            $this->argument('id')
        );

        $this->info('İşlem gerçekleştirilmiştir.');
    }
}
