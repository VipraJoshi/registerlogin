<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    public function index(){
        if (request()->ajax()) {
            $cities = City::select('city.id', 'city.city as city', 'state.state as state', 'country.country as country')
            ->join('state', 'city.state_id', '=', 'state.id') 
            ->join('country', 'state.country_id', '=', 'country.id') 
            ->get();
            return DataTables::of($cities)->make(true);
        }
        
        return view ('citylist');
    }
}
