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
use App\Models\Polygons;
use App\Models\Geofield;

// Route::get('LoginRequest/{comp_id}', 'LoginRequest@getCompanyId')->name('')


class CompanyController extends Controller
{
    // function to receive all data
    public function all()
    {
        $company = Company::all();
        return response()->json($company);
    }

    // function to receive all data to the website
    public function show()
    {
        $company = Company::all();
        return view('compview', ['companies' => $company]);
    }

    //
    public function CreateCompany(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|max:255|regex:/^[a-zA-Z]+$/u',
            'reg_nr' => 'required|numeric',
            'vat_nr' => 'required|numeric',
            'address' => 'required|max:255',
            'phone' => 'required|numeric|digits:9',
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->reg_nr = $request->input('reg_nr');
        $company->vat_nr = $request->input('vat_nr');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');



        $company->save();
        return redirect('/companies')->with('info', 'Company Created Successfully');
    }

    public function GetCompany($id)
    {
        $company = Company::find($id);
        return view('compedit', ['companies' => $company]);
    }



    public function EditCompany(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|regex:/^[a-zA-Z]+$/u',
            'reg_nr' => 'required|numeric',
            'vat_nr' => 'required|numeric',
            'address' => 'required|max:255',
            'phone' => 'required|numeric|digits:9',
        ]);

        $company = Company::find($id);

        $company->name = $request->input('name');
        $company->reg_nr = $request->input('reg_nr');
        $company->vat_nr = $request->input('vat_nr');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');

        $company->save();
        return redirect('/companies')->with('info', 'Company Updated Successfully');
    }

    public function DeleteCompany($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/companies')->with('info', 'Company Deleted Successfully');
    }





    public function company()
    {

        $company = Company::find(Auth::user()->company_id);
        $fields = Field::where('company_id', Auth::user()->company_id)->get();
        // create $geofield that uses geojson column from geofields table
        $geofielddata = Geofield::all();
        foreach ($geofielddata as $row) {
            $geofield[] = $row->geojson;
        }



        return view('dashboard', ['company' => $company, "fields" => $fields], compact('geofield'));
    }


    public function GetData($id)
    {
        $fields = Field::find($id);
        $companies = Company::all($columns = ['id']);
        return view('dashboardedit', ['data' => $fields, 'company' => $companies]);
    }

    public function GetDataCreate()
    {
        $companies = Company::all($columns = ['id']);
        return view('dashboardadd', ['company' => $companies]);
    }



    public function CreateData(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|max:255',
            'area' => 'required|max:15',
            'type' => 'required|max:15',
            'company_id' => 'required|numeric'
        ]);


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
            'address' => 'required|max:255',
            'area' => 'required|max:15',
            'type' => 'required|max:15',
            'company_id' => 'required|numeric'
        ]);



        $fields = Field::find($id);
        $fields->address = $request->input('address');
        $fields->area = $request->input('area');
        $fields->type = $request->input('type');
        $fields->company_id = $request->input('company_id');
        $fields->save();
        return redirect('/dashboard');
    }

    public function DeleteData($id)
    {
        $fields = Field::find($id);
        $fields->delete();
        return redirect('/dashboard');
    }


    public function polygons()
    {
        $polygons = Polygons::all();
        return view('map', ['polygons' => $polygons]);
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
