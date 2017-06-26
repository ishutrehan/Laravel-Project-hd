<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyModel as Property;
use App\Models\PropertySearchTypeModel as PropertySearchType;
use App\Models\PropertyTypeModel as PropertyType;
use DB;

class PropertyListingController extends Controller
{
    public function index()
    {
        $custom = true;
        $title = "Property Listing";
        $property_list = Property::paginate(6);
        $property_type = PropertyType::all();
        $search_list = PropertySearchType::where('is_enabled', '=', '1')->get();
        $states = DB::table("states")->get();

        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }

        // echo "<pre>"; print_r($search_list); exit;
        return view('frontend.pages.property_listing.index', compact('custom', 'property_list', 'title', 'search_list', 'property_type', 'all_states'));
    }

    public function search_property(Request $request)
    {
        $req = $request->search;
        $where = array();
        if (isset($req['paginate']) && $req['paginate'] != '') {
            $paginate = $req['paginate'];
        }
        else
        {
            $paginate = '6';
        }
        if (isset($req['state']) && $req['state'] != '') {
            $where['state'] = $req['state'];
        }
        if (isset($req['city']) && $req['city'] != '') {
            $where['city'] = $req['city'];
        }/*
        if (isset($req['city']) && $req['city'] != '') {
            $where['city'] = $req['city'];
        }*/
        if (isset($req['num_car']) && $req['num_car'] != '') {
            $where['garage_capacity'] = $req['num_car'];
        }
        if (isset($req['garage']) && $req['garage'] != '') {
            $where['garage'] = $req['garage'];
        }
        if (isset($req['pool']) && $req['pool'] != '') {
            $where['pool'] = $req['pool'];
        }
        /*if (isset($req['bedrooms']) && is_array($req['bedrooms'])) {
            $req['bedrooms'] = 
            $where['garage_capacity'] = $req['num_car'];
        }*/
        if (isset($req['in_city']) && $req['in_city'] != '') {
            $where['in_city'] = $req['in_city'];

        }
        if (isset($req['nearest_market']) && $req['nearest_market'] != '') {
            if(isset($req['in_city']) && $req['in_city'] == 1)
            {
                $where['in_city_market'] = $req['nearest_market'];
            }
            else
            {
                $where['not_in_city_market'] = $req['nearest_market'];
            }
        }
        if (isset($req['nearest_school']) && $req['nearest_school'] != '') {
            if(isset($req['in_city']) && $req['in_city'] == 1)
            {
                $where['in_city_school'] = $req['nearest_school'];
            }
            else
            {
                $where['not_in_city_school'] = $req['nearest_school'];
            }
        }
        if (isset($req['nearest_hospital']) && $req['nearest_hospital'] != '') {
            if(isset($req['in_city']) && $req['in_city'] == 1)
            {
                $where['in_city_hospital'] = $req['nearest_hospital'];
            }
            else
            {
                $where['not_in_city_hospital'] = $req['nearest_hospital'];
            }
        }

        $properties = Property::where($where)->paginate($paginate);
        // echo "<pre>"; print_r($properties); exit;
        return $properties;
    }
}
