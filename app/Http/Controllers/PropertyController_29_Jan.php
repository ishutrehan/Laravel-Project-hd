<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\PropertyModel as Property;
use App\Models\SellerModel as Seller;
use Hash;
use DB;
use Redirect;
use Response;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.property.index');
    }

    // fetch record in datatable for mortgage loan officer
    public function property_datatable()
    {
        $property = Property::select([
            'tbl_properties.unique_id',
            'tbl_properties.title',
            'tbl_properties.address',
            'ct.city AS city_name',
            'st.state AS state_name',
            'tbl_properties.created_at',
            'tbl_properties.updated_at'
        ])
        ->join('states AS st', 'st.state_code', '=', 'tbl_properties.state')
        ->join('cities_extended AS ct', 'ct.id', '=', 'tbl_properties.city');

        $datatable = Datatables::of($property)
        ->editColumn('title',function($property){
            return ucwords($property->title);
        })
        ->editColumn('address',function($property){
            return ucwords($property->address);
        })
        ->editColumn('city_name',function($property){
            return ucwords($property->city_name);
        })
        ->editColumn('state_name',function($property){
            return ucwords($property->state_name);
        })
        ->editColumn('created_at',function($property){
            return date('d-M-y h:i a', strtotime($property->created_at));
        })
        ->editColumn('updated_at',function($property){
            return date('d-M-y h:i a', strtotime($property->updated_at));
        })
        ->addColumn('action',function($property){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$property->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$property->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$property->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        // override global search when we concate the columns
        /*if ($keyword = \Request::get('search')['value']) {
                    
            $datatable->filterColumn('property_name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
        }*/

        //------ Custom Search --------//
        /*if ($property = \Request::get('mortgage')) {
            $datatable->where('name', 'like', "$property%");
        }

        if ($address = \Request::get('address')) {
            $datatable->where('address', 'like', "$address%");
        }*/

        if ($date_range = \Request::get('date_range')) {
            $dates = explode(" - ", $date_range);
            // $datatable->whereBetween('date_created', array(trim($dates[0]), trim($dates[1])));
            $datatable->whereBetween('created_at', array(trim($dates[0]), trim($dates[1])))
                ->orWhere(function($query) use ($dates){
                    $query->whereBetween('updated_at', array(trim($dates[0]), trim($dates[1])));
                });
        }

        return $datatable->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table("states")->get();
        $sellers = Seller::all();

        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }

        $all_sellers = '';
        foreach ($sellers as $ky => $valu) {
            $all_sellers .= "<option value='".$valu->unique_id."'> ".ucwords($valu->first_name).' '.ucwords($valu->last_name)." </option>";
        }

        return view('backend.pages.property.create', compact('all_states', 'all_sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        if(isset($requestData['property_images']) && $request->hasFile('property_images'))
        {
            foreach ($requestData['property_images'] as $key => $images) {
                // echo "hello";
                $original_filename = $requestData['property_images'][$key]->getClientOriginalName();
                $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s')).$original_filename).'.'.$requestData['property_images'][$key]->getClientOriginalExtension();
                $requestData['property_images'][$key]->move('uploads/property', $upload_filename);
                $property_images = array(
                    'original_filename' => $original_filename,
                    'upload_filename' => $upload_filename
                );
                $all_prop_imgs[$key] = $property_images;
            }
            // echo "<pre>"; print_r($requestData['property_images']); exit;
            $requestData['property_images'] = json_encode($all_prop_imgs);
        }
        else
        {
            $requestData['property_images'] = '';
        }
        // have to remove after 
        $requestData['seller_id'] = (isset($requestData['seller_id']) && $requestData['seller_id'] != '') ? $requestData['seller_id'] : 0;
        $requestData['property_type'] = 1;
        $requestData['unique_id'] = md5(strtotime(date('Y-m-d H:i:s')).time());

        if(Property::create($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($uid)
    {
        $property_details = Property::select('tbl_properties.*', 'st.state AS state_name', 'ct.city AS city_name')
            ->where('tbl_properties.unique_id', '=', $uid)
            ->join('states AS st', 'st.state_code', '=', 'tbl_properties.state')
            ->join('cities_extended AS ct', 'ct.id', '=', 'tbl_properties.city')
            ->get();

        return view('backend.pages.property.view', compact('property_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $states = DB::table("states")->get();
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }

        $sellers = Seller::all();
        $all_sellers = '';
        foreach ($sellers as $ky => $valu) {
            $all_sellers .= "<option value='".$valu->unique_id."'> ".ucwords($valu->first_name).' '.ucwords($valu->last_name)." </option>";
        }

        $property_details = Property::where('unique_id', '=', $uid)->get();
        return view('backend.pages.property.edit', compact('property_details', 'all_states', 'all_sellers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $requestData = $request->all();
        //echo "<pre>"; print_r($requestData);
        $property_uid = $requestData['property_id'];

        if(isset($requestData['property_images']) && $request->hasFile('property_images'))
        {
            if($requestData['overwrite_prop_img'] == 1)
            {
                foreach ($requestData['property_images'] as $key => $images) {
                    // echo "hello";
                    $original_filename = $requestData['property_images'][$key]->getClientOriginalName();
                    $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s')).$original_filename).'.'.$requestData['property_images'][$key]->getClientOriginalExtension();
                    $requestData['property_images'][$key]->move('uploads/property', $upload_filename);
                    $property_images = array(
                        'original_filename' => $original_filename,
                        'upload_filename' => $upload_filename
                    );
                    $all_prop_imgs[$key] = $property_images;
                }
                // echo "<pre>"; print_r($requestData['property_images']); exit;
                $requestData['property_images'] = json_encode($all_prop_imgs);
            }
            elseif($requestData['overwrite_prop_img'] == 2)
            {
                $prop_images = Property::where('unique_id', '=', $property_uid)->get()->property_images;
                $proprty_images = json_decode($prop_images, true);

                foreach ($requestData['property_images'] as $key => $images) {
                    // echo "hello";
                    $original_filename = $requestData['property_images'][$key]->getClientOriginalName();
                    $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s')).$original_filename).'.'.$requestData['property_images'][$key]->getClientOriginalExtension();
                    $requestData['property_images'][$key]->move('uploads/property', $upload_filename);
                    $property_image = array(
                        'original_filename' => $original_filename,
                        'upload_filename' => $upload_filename
                    );
                    array_push($proprty_images, $property_image);
                }

                $requestData['property_images'] = json_encode($proprty_images);
            }
        }
        else
        {
            unset($requestData['property_images']);
        }
        unset($requestData['property_id']);
        unset($requestData['overwrite_prop_img']);

        $requestData['seller_id'] = (isset($requestData['seller_id']) && $requestData['seller_id'] != '') ? $requestData['seller_id'] : 0;
        $requestData['property_type'] = 1;
        
        if(Property::where('unique_id', '=', $property_uid)->update($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $uid = $request->property_id;
        if(Property::where('unique_id', '=', $uid)->delete())
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);
        }
        return json_encode($return);
    }

    /*public function download_attach($file)
    {
        $file = "/property/".$file;
        return Response::download($file);
    }*/
}
