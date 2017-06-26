<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommonController extends Controller
{
    public function ajax_fetch_cities(Request $request)
    {
    	$state_code = $request->state_code;
    	$cities_data = DB::table('cities_extended')
    				->where("state_code", "=", $state_code)
    				->get();
    	// echo "pre"; print_r($cities_data); exit;
    	$all_option = '';
    	foreach ($cities_data as $key => $val) {
    		if(strlen($val->zip) == 3)
    		{
    			$zip_code = '00'.$val->zip;
    		}
    		elseif(strlen($val->zip) == 4)
    		{
    			$zip_code = '0'.$val->zip;
    		}
    		else
    		{
    			$zip_code = $val->zip;
    		}
    		$all_option .= "<option value='".$val->id."' data-zip='".$zip_code."'>".$val->city." (".$zip_code.")</option>";
    	}
    	return json_encode($all_option);
    	exit;
    }
}
