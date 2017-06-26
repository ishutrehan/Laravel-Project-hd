<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertySearchTypeModel as PropertySearchType;
use App\Models\PropertyTypeModel as PropertyType;
use Illuminate\Support\Facades\Session;
use DB;

class PropertySearchController extends Controller
{
    public function index()
    {
    	// echo "hello"; exit;
    	$custom = true;
        $title = "Property Listing";
    	$search_type = PropertySearchType::all();
        $property_type = PropertyType::all();
        // echo "<pre>"; print_r($search_type); exit;
        return view('backend.pages.manage_search.property_listing', compact('custom', 'search_type', 'title', 'property_type'));
    }

    public function update_search_params(Request $request)
    {
        // echo "hello"; exit;
        // echo "<pre>"; print_r($request->search_type); exit;
        foreach ($request->search_type['is_enabled'] as $key => $value) {
            $upd_status = PropertySearchType::where('search_slug', '=', $value)->update(array('is_enabled' => '1'));
            if($upd_status)
            {
                if($value != 'location')
                {
                    if(is_array($request->search_type[$value]))
                    {
                        $data = json_encode($request->search_type[$value]);
                    }
                    else
                    {
                        $data = $request->search_type[$value];
                    }
                }
                else
                {
                    $data = '1';
                }
                PropertySearchType::where('search_slug', '=', $value)->update(array('search_params' => $data));
            }
        }
        Session::flash('update_search', "Search Parameters Successfully Updated");
        // echo "<pre>"; print_r($search_type); exit;
        redirect('admin/manage_search/property_listing');
        // return view('backend.pages.manage_search.property_listing', compact('custom', 'search_type', 'title', 'property_type'));
    }
}
