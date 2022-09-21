<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function all()
    {
        $company = Company::all();
        return response() -> json($company);

    }

    public function id($id)
    {
        $company = Company::find($id);
        response()->json($company);

    }

    /*public function GetCompanyJson()
    {
        $id = "2";
        $vat_nr = 'test';
        $attributes = ['test' => 'data'];
        $json_api_response = new JsonApiFormatter();
        $response = $json_api_response->dataResourceResponseArray($id, $vat_nr, $attributes);
        return response()->GetCompanyJson($response);
    }*/

    public function create(Request $request)
    {


        $company = new Company();
        $company->name = $request->input('name');
        $company->reg_nr = $request->input('reg_nr');
        $company->vat_nr = $request->input('vat_nr');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');



        $company->save();
        return response()->json($company);


    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'reg_nr' => 'required',
            'vat_nr' => 'required',
        ]);

        $company = Company::find($id);


        $company->name = $request->input('name');
        $company->reg_nr = $request->input('reg_nr');
        $company->vat_nr = $request->input('vat_nr');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');

        $company->save();

        return response()->json($company);

    }


    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        return response()->json('Company Deleted Successfully');
    }
}
