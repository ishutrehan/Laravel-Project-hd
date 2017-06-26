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
        $all_search_data = $request->search_type;
        $all_search_type = PropertySearchType::all();
        // echo "<pre>"; print_r($all_search_data); exit();
        foreach ($all_search_type as $key => $value) {
            if(in_array($value['search_slug'], $all_search_data['is_enabled']))
            {
                // echo 'hello';
                    // echo $all_search_data['is_enabled'];
                if($value['search_slug'] == 'location')
                {
                    $data = '1';
                }
                else
                {
                    if(is_array(($all_search_data[$value['search_slug']])))
                    {
                        $data = json_encode($all_search_data[$value['search_slug']]);
                    }
                    else
                    {
                        $data = $all_search_data[$value['search_slug']];
                    }
                }

                PropertySearchType::where('search_slug', '=', $value['search_slug'])->update(array('is_enabled' => '1', 'search_params' => $data));
            }
            else
            {
                PropertySearchType::where('search_slug', '=', $value['search_slug'])->update(array('is_enabled' => '2', 'search_params' => NULL));
            }
        }
        // exit;
        Session::flash('update_search', "Search Parameters Successfully Updated");
        // echo "<pre>"; print_r($search_type); exit;
        return redirect('admin/manage_search/property_listing');
        // return view('backend.pages.manage_search.property_listing', compact('custom', 'search_type', 'title', 'property_type'));
    }
}
