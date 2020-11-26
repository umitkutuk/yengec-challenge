<?php

namespace App\Console\Commands\Integration;

use App\Models\Integration;
use App\Services\Integration\IntegrationServiceInterface;
use Illuminate\Console\Command;

class DeleteIntegration extends Command
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
    protected $signature = 'integration:delete {id}';

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
     * @throws \Exception
     */
    public function handle()
    {
        //Burayı servisten almalıydım.
        $IntegrationExists = Integration::where('id', $this->argument('id'))->exists();
        if (!$IntegrationExists) {
            $this->error('Integration not exists!');
            return null;
        }

        $this->integrationService->destroyIntegration($this->argument('id'));

        $this->info('İşlem gerçekleştirilmiştir.');

        return 0;
    }
}
