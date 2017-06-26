<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\InspectorModel as Inspector;
use Hash;
use DB;
// use Redirect;
use Response;

class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.inspector.index');
    }

    // fetch record in datatable for realtor
    public function inspector_datatable()
    {
        $inspector = Inspector::select([
            'unique_id',
            'profile_pic',
            \DB::raw("CONCAT(first_name,' ',last_name) as inspector_name"),
            'address',
            'email',
            'created_at',
            'updated_at'
        ]);

        // datatable for realtors
        $datatable = Datatables::of($inspector)
        ->editColumn('profile_pic',function($inspector){
            $profile_pic = json_decode($inspector->profile_pic, true);
            return "<img src='".url('uploads/inspector/profile_pic')."/".$profile_pic['upload_filename']."' style='width:50px;' />";
        })
        ->editColumn('inspector_name',function($inspector){
            return ucwords($inspector->inspector_name);
        })
        ->editColumn('address',function($inspector){
            return ucwords($inspector->address);
        })
        /*->editColumn('status',function($inspector){
            return ucfirst($inspector->status);
        })*/
        ->editColumn('created_at',function($inspector){
            return date('d-M-y h:i a', strtotime($inspector->created_at));
        })
        ->editColumn('updated_at',function($inspector){
            return date('d-M-y h:i a', strtotime($inspector->updated_at));
        })
        ->addColumn('action',function($inspector){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$inspector->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$inspector->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$inspector->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        // override global search when we concate the columns
        if ($keyword = \Request::get('search')['value']) {
                    
            $datatable->filterColumn('inspector_name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
        }

        //------ Custom Search --------//
        /*if ($inspector = \Request::get('realtor')) {
            $datatable->where('name', 'like', "$inspector%");
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
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }
        return view('backend.pages.inspector.create', compact('all_states'));
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

        if(isset($requestData['id_proof_file']) && $request->hasFile('id_proof_file'))
        {
            $original_filename = $requestData['id_proof_file']->getClientOriginalName();
            $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('id_proof_file')->getClientOriginalExtension();
            $request->file('id_proof_file')->move('uploads/inspector/id_proof', $upload_filename);
            $id_proof_attachment = array(
                'original_filename' => $original_filename,
                'upload_filename' => $upload_filename
            );
            $requestData['id_proof_attachment'] = json_encode($id_proof_attachment);
        }
        else
        {
            $requestData['id_proof_attachment'] = '';
        }

        // profile pic
        if($request->hasFile('profile_pic') && $request->hasFile('profile_pic'))
        {
            $original_profile_filename = $requestData['profile_pic']->getClientOriginalName();
            $upload_profile_filename = md5(time().strtotime(date('Y-m-d H:i:s')).$request->file('profile_pic')->getClientOriginalName()).'.'.$request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->move('uploads/inspector/profile_pic/', $upload_profile_filename);
            $profile_pic = array(
                'original_filename' => $original_profile_filename,
                'upload_filename' => $upload_profile_filename
            );
            $requestData['profile_pic'] = json_encode($profile_pic);
        }
        else
        {
            $requestData['profile_pic'] = '';
        }
        // dd($uplaod_filename);
        $find1 = array('(', ') ', '-');
        $replace1 = array('');
        $requestData['telephone'] = str_replace($find1, $replace1, $requestData['telephone']);
        $find2 = array('-');
        $replace2 = array('');
        $requestData['mobile'] = str_replace($find2, $replace2, $requestData['mobile']);
        $requestData['unique_id'] = md5(strtotime(date('Y-m-d H:i:s')).time());
        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['id_proof_attachment'] = json_encode($id_proof_attachment);
        // echo "<pre>"; print_r($requestData);
        if(Inspector::create($requestData))
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
        $inspector_details = DB::table("tbl_inspectors")
                ->join('states', 'states.state_code', '=', 'tbl_inspectors.state')
                ->join('states as ts', 'ts.state_code', '=', 'tbl_inspectors.licensed_state')
                ->join('cities_extended', 'cities_extended.id', '=', 'tbl_inspectors.city')
                ->select('tbl_inspectors.*', 'states.state AS state_name', 'cities_extended.city AS city_name', 'ts.state AS lstate_name')
                ->where('unique_id', '=', $uid)
                ->get();
        // echo "<pre>"; print_r($inspector_details[0]); exit;
        return view('backend.pages.inspector.view', compact('inspector_details'));
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
        $inspector_details = Inspector::where('unique_id', '=', $uid)->get();
        return view('backend.pages.inspector.edit', compact('inspector_details', 'all_states'));
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
        $inspector_uid = $requestData['inspector_id'];
        $find1 = array('(', ') ', '-');
        $replace1 = array('');
        $requestData['telephone'] = str_replace($find1, $replace1, $requestData['telephone']);
        $find2 = array('-');
        $replace2 = array('');
        $requestData['mobile'] = str_replace($find2, $replace2, $requestData['mobile']);
        // upload ID proof
        if (isset( $requestData['id_proof_file']) && $request->hasFile('id_proof_file'))
        {
            $original_filename = $requestData['id_proof_file']->getClientOriginalName();
            $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('id_proof_file')->getClientOriginalExtension();
            $request->file('id_proof_file')->move('uploads/inspector/id_proof', $upload_filename);
            $id_proof_attachment = array(
                'original_filename' => $original_filename,
                'upload_filename' => $upload_filename
            );
            $requestData['id_proof_attachment'] = json_encode($id_proof_attachment);
        }
        else
        {
            unset($requestData['id_proof_attachment']);
        }

        // upload profile pic
        if (isset( $requestData['profile_pic']) && $request->hasFile('profile_pic'))
        {
            $original_pic_filename = $requestData['profile_pic']->getClientOriginalName();
            $upload_pic_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->move('uploads/inspector/profile_pic', $upload_filename);
            $profile_pic = array(
                'original_filename' => $original_pic_filename,
                'upload_filename' => $upload_pic_filename
            );
            $requestData['profile_pic'] = json_encode($profile_pic);
        }
        else
        {
            unset($requestData['profile_pic']);
        }

        unset($requestData['inspector_id']);
        unset($requestData['id_proof_file']);
        if(Inspector::where('unique_id', '=', $inspector_uid)->update($requestData))
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
        $uid = $request->inspector_id;
        if(Inspector::where('unique_id', '=', $uid)->delete())
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
        $file = "/inspector/".$file;
        return Response::download($file);
    }*/
}
