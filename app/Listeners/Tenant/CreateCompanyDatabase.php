<?php

namespace App\Listeners\Tenant;

use App\Events\Tenent\CompanyCreated;
use App\Events\Tenent\DatabaseCreated;
use App\Tenant\Database\DatabaseManager;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class CreateCompanyDatabase
{
    private $database;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Tenent\CompanyCreated  $event
     * @return void
     */
    public function handle(CompanyCreated $event)
    {

        $company = $event->company();

        if (!$this->database->createDatabase($company)) {
            throw new Exception('Error create database');
        }

        //Run migrations
        event(new DatabaseCreated($company));
    }
}
