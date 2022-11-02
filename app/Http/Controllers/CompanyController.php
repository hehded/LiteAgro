<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Field;
use App\Http\Middleware\EnsureToken;
use Illuminate\App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;
use View;

// Route::get('LoginRequest/{comp_id}', 'LoginRequest@getCompanyId')->name('')


class CompanyController extends Controller
{
    public function all()
    {
        $company = Company::all();
        return response()->json($company);
    }

    public function company()
    {

        $company = Company::find(Auth::user()->company_id);
        $fields = Field::where('company_id', Auth::user()->company_id)->get();
        return view('dashboard', ['company' => $company, "fields" => $fields]);
    }


    public function GetData($id)
    {
        $fields = Field::find($id);
        return view('dashboardedit', ['data' => $fields]);
    }


    public function CreateData(Request $request)
    {



        $fields = new Field();
        $fields->address = $request->input('address');
        $fields->area = $request->input('area');
        $fields->type = $request->input('type');
        $fields->company_id = $request->input('company_id');
        $fields->save();
        return redirect('/dashboard');
    }


    public function EditData(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required',
            'area' => 'required',
            'type' => 'required',
        ]);


        $fields = Field::find($id);
        $fields->address = $request->input('address');
        $fields->area = $request->input('area');
        $fields->type = $request->input('type');
        $fields->save();
        return redirect('/dashboard');

    }

    public function DeleteData($id)
    {
        $fields = Field::find($id);
        $fields->delete();
        return redirect('/dashboard');
    }


    public function id($id)
    {
        $company = Company::find($id);
        response()->json($company);
    }





    // public function GetCompanyJson()
    // {
    //     $id = "2";
    //     $vat_nr = 'test';
    //     $attributes = ['test' => 'data'];
    //     $json_api_response = new JsonApiFormatter();
    //     $response = $json_api_response->dataResourceResponseArray($id, $vat_nr, $attributes);
    //     return response()->GetCompanyJson($response);
    // }

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
