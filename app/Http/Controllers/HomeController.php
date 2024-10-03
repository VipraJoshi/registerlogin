<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class HomeController extends Controller
{
    public function index(){
        $country = Country::all();
        return view('register', ['country' => $country]);
    }

    public function getstate(Request $request){
        $cid = $request->input('cid');
        $state = State::where('country_id',$cid)->orderBy('id','asc')->get();
        $html = '<option value="">Select State...</option>';
        foreach ($state as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->state . '</option>';
        }
        echo $html;
    }

    public function getcity(Request $request){
        $sid = $request->input('sid');
        $city = City::where('state_id',$sid)->orderBy('id','asc')->get();
        $html = '<option value="">Select City...</option>';
        foreach ($city as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->city . '</option>';
        }
        echo $html;
    }
}
