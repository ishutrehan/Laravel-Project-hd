<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\AppraisersModel as Appraisers;
use Hash;
use DB;
use Redirect;
use Response;

class AppraisersController extends Controller
{
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.appraisers.index');
    }

    // fetch record in datatable for mortgage loan officer
    public function appraisers_datatable()
    {
        $appraisers = Appraisers::select([
            'unique_id',
            'profile_pic',
            \DB::raw("CONCAT(first_name,' ',last_name) as appraisers_name"),
            'address',
            'email',
            'created_at',
            'updated_at'
        ]);

        $datatable = Datatables::of($appraisers)
        ->editColumn('profile_pic',function($appraisers){
            $profile_pic = json_decode($appraisers->profile_pic, true);
            return "<img src='".url('uploads/appraisers/profile_pic')."/".$profile_pic['upload_filename']."' style='width:50px;' />";
        })
        ->editColumn('appraisers_name',function($appraisers){
            return ucwords($appraisers->appraisers_name);
        })
        ->editColumn('address',function($appraisers){
            return ucwords($appraisers->address);
        })
        /*->editColumn('status',function($appraisers){
            return ucfirst($appraisers->status);
        })*/
        ->editColumn('created_at',function($appraisers){
            return date('d-M-y h:i a', strtotime($appraisers->created_at));
        })
        ->editColumn('updated_at',function($appraisers){
            return date('d-M-y h:i a', strtotime($appraisers->updated_at));
        })
        ->addColumn('action',function($appraisers){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$appraisers->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$appraisers->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$appraisers->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        // override global search when we concate the columns
        if ($keyword = \Request::get('search')['value']) {
                    
            $datatable->filterColumn('appraisers_name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
        }

        //------ Custom Search --------//
        /*if ($appraisers = \Request::get('appraisers')) {
            $datatable->where('name', 'like', "$appraisers%");
        }

        if ($address = \Request::get('address')) {
            $datatable->where('address', 'like', "$address%");
        }*/

        if ($date_range = \Request::get('date_range')) {
            $dates = explode(" - ", $date_range);
            $datatable->whereBetween('created_at', array(trim($dates[0]), trim($dates[1])))
                ->orWhere(function($query) use ($dates){
                        $query->whereBetween('updated_at', array(trim($dates[0]), trim($dates[1])));
                });
        }

        return $datatable->make(true);
    }

    public function create()
    {
        $states = DB::table("states")->get();
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }
        return view('backend.pages.appraisers.create', compact('all_states'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        // dd($requestData);exit;
        if(isset($requestData['id_proof_file']) && $request->hasFile('id_proof_file'))
        {
            $original_filename = $requestData['id_proof_file']->getClientOriginalName();
            $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('id_proof_file')->getClientOriginalExtension();
            $request->file('id_proof_file')->move('uploads/appraisers/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/appraisers/profile_pic/', $upload_profile_filename);
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

        // experience i.e. year and month
        $experience = array(
            'year' => $requestData['experi_year'],
            'month' => $requestData['experi_month']
        );
        $requestData['experience'] = json_encode($experience);

        // dd($upload_filename);
        $find1 = array('(', ') ', '-');
        $replace1 = array('');
        $requestData['telephone'] = str_replace($find1, $replace1, $requestData['telephone']);

        $find2 = array('-');
        $replace2 = array('');
        $requestData['mobile'] = str_replace($find2, $replace2, $requestData['mobile']);
        $requestData['unique_id'] = md5(strtotime(date('Y-m-d H:i:s')).time());
        $requestData['password'] = Hash::make($requestData['password']);

        if(Appraisers::create($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);
    }

    public function view($uid)
    {
        $appraisers_details = Appraisers::select('tbl_appraisers.*', 'st.state AS state_name', 'lst.state AS lstate_name')->where('tbl_appraisers.unique_id', '=', $uid)
            ->join('states AS st', 'st.state_code', '=', 'tbl_appraisers.state')
            ->join('states AS lst', 'lst.state_code', '=', 'tbl_appraisers.licensed_state')
            ->get();
        return view('backend.pages.appraisers.view', compact('appraisers_details'));
    }

    public function edit($uid)
    {
        $states = DB::table("states")->get();
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }
        $appraisers_details = Appraisers::where('unique_id', '=', $uid)->get();
        return view('backend.pages.appraisers.edit', compact('appraisers_details', 'all_states'));
    }

    public function update(Request $request)
    {
        $requestData = $request->all();
        $appraiser_uid = $requestData['appraisers_id'];
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
            $request->file('id_proof_file')->move('uploads/appraisers/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/appraisers/profile_pic', $upload_pic_filename);
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

        $experience = array(
            'year' => $requestData['experi_year'],
            'month' => $requestData['experi_month']
        );
        $requestData['experience'] = json_encode($experience);

        unset($requestData['experi_year']);
        unset($requestData['experi_month']);
        unset($requestData['appraisers_id']);
        unset($requestData['id_proof_file']);
        if(Appraisers::where('unique_id', '=', $appraiser_uid)->update($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);
    }

    public function destroy(Request $request)
    {
        $uid = $request->appraisers_id;
        if(Appraisers::where('unique_id', '=', $uid)->delete())
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
        $file = "/mortgage_agent/".$file;
        return Response::download($file);
    }*/
}
