<?php

namespace App\Console\Commands\Tenant;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Database\Seeders\Tenant\UsersTableSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tanants:seed {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Seeder Tenants';

    private $tenant;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $tenant)
    {
        parent::__construct();
        $this->tenant = $tenant;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->argument('id')) {
            $company = Company::find($this->argument('id'));

            if ($company)
                $this->execCommand($company);

            return;
        }

        $companies = Company::all();

        foreach ($companies as $company) {
            $this->execCommand($company);
        }
    }

    public function execCommand(Company $company)
    {

        $this->tenant->setConnection($company);

        $run = Artisan::call('db:seed', [
            '--class' => UsersTableSeeder::class,
        ]);

        if ($run === 0) {
            $this->info("Seeder created successfully {$company->name}");
            $this->info('-----------------------------------------');
        }
    }
}
