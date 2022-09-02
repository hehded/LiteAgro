<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function GetAllCompany()
    {
        $company = Company::all();
        return response()->json($company);

    }

    public function GetCompanyId($id)
    {
        $company = Company::find($id);
        return response()->json($company);
    }

}
