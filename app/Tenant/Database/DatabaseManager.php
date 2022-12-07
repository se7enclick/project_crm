<?php

namespace App\Tenant\Database;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseManager
{
    public function createDatabase(Company $company)
    {
        Log::info('estou criando o banco da dados');
        return DB::statement("
            CREATE DATABASE {$company->bd_database} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
        ");
    }
}
