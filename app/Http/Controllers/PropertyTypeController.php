<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\PropertyTypeModel as PropertyType;
use DB;
// use Redirect;
use Response;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.property_type.index');
    }

    // fetch record in datatable for property_type
    public function property_type_datatable()
    {
        $property_type = PropertyType::select([
            'unique_id',
            'property_type',
            'description',
            'created_at',
            'updated_at'
        ]);

        // datatable for property_types
        $datatable = Datatables::of($property_type)
        ->editColumn('property_type',function($property_type){
            return ucwords($property_type->property_type);
        })
        ->editColumn('description',function($property_type){
            return ucwords($property_type->description);
        })
        ->editColumn('created_at',function($property_type){
            return date('d-M-y h:i a', strtotime($property_type->created_at));
        })
        ->editColumn('updated_at',function($property_type){
            return date('d-M-y h:i a', strtotime($property_type->updated_at));
        })
        ->addColumn('action',function($property_type){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$property_type->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$property_type->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$property_type->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        //------ Custom Search --------//
        /*if ($property_type = \Request::get('property_type')) {
            $datatable->where('name', 'like', "$property_type%");
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
        return view('backend.pages.property_type.create');
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
        $requestData['unique_id'] = md5(strtotime(date('Y-m-d H:i:s')).time());
        if(PropertyType::create($requestData))
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
        $property_type_details = DB::table("tbl_property_type")
                ->where('unique_id', '=', $uid)
                ->get();
        // echo "<pre>"; print_r($property_type_details[0]); exit;
        return view('backend.pages.property_type.view', compact('property_type_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $property_type_details = PropertyType::where('unique_id', '=', $uid)->get();
        return view('backend.pages.property_type.edit', compact('property_type_details'));
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
        $property_type_uid = $requestData['property_type_id'];

        unset($requestData['property_type_id']);
        if(PropertyType::where('unique_id', '=', $property_type_uid)->update($requestData))
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
        $uid = $request->property_type_id;
        if(PropertyType::where('unique_id', '=', $uid)->delete())
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);
        }
        return json_encode($return);
    }
}
