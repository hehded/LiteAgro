<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geofield;
use Termwind\Components\Dd;

class MapController extends Controller
{
    public function GetGeofield($id)
    {
        // find the geofield with the field id 
        $geofield = Geofield::all()->where('field_id', $id);
        // dd($geofield);
        return redirect('/dashboard/map/{$id}');
}
}
