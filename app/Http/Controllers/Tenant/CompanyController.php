<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenent\CompanyCreated;
use App\Events\Tenent\DatabaseCreated;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $company = $this->company->create([
            'name'          => 'Empresa x ' . Str::random(5),
            'domain'        => 'projeto' . rand(3, 10) . '.local',
            'subdomain'     => 'projeto' . rand(3, 10) . '.local',
            'bd_database'   => 'project' . rand(3, 10),
            'bd_hostname'   => 'mysql',
            'bd_username'   => 'root',
            'bd_password'   => 'secret',
        ]);

        if (true) {
            event(new CompanyCreated($company));
        } else {
            event(new DatabaseCreated($company));
        }

        dd($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
