<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Floor9design\JsonApiFormatter\Models\JsonApiFormatter;
use Floor9design\JsonApiFormatter\Models\DataResource;



class CompanyController extends Controller
{
     public function GetAllCompany()
    {
        $json_api_formatter = new JsonApiFormatter();
        $company = Company::all();
        $response = $json_api_formatter->dataResourceResponseArray($company);

    }

    public function GetCompanyId($id)
    {
        /*$company = Company::find($id);
        return response()->json($company);*/

        $company = Company::find($id);
        $company = Parser::parseRequestString($company);
    }

}
