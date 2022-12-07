<?php

use App\Http\Controllers\Tenant\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'tenant';
});


// Route::resource('companies', CompanyController::class);


Route::get('company/store', [CompanyController::class, 'store'])->name('company.store');
// Route::get('company/store', 'Company@store')->name('company.store');
