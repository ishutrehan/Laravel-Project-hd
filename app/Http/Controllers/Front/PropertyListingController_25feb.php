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

        // echo "<pre>"; print_r($search_list[0]); exit;
        return view('frontend.pages.property_listing.index', compact('custom', 'property_list', 'title', 'search_list', 'property_type', 'all_states'));
    }
}
