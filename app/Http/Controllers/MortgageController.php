<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\MortgageModel as Mortgage;
use Hash;
use DB;
use Redirect;
use Response;

class MortgageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.mortgage.index');
    }

    // fetch record in datatable for mortgage loan officer
    public function mortgage_datatable()
    {
        $mortgage = Mortgage::select([
            'unique_id',
            'profile_pic',
            \DB::raw("CONCAT(first_name,' ',last_name) as mortgage_name"),
            'address',
            'email',
            'created_at',
            'updated_at'
        ]);

        $datatable = Datatables::of($mortgage)
        ->editColumn('profile_pic',function($mortgage){
            $profile_pic = json_decode($mortgage->profile_pic, true);
            return "<img src='".url('uploads/mortgage_agent/profile_pic')."/".$profile_pic['upload_filename']."' style='width:50px;' />";
        })
        ->editColumn('mortgage_name',function($mortgage){
            return ucwords($mortgage->mortgage_name);
        })
        ->editColumn('address',function($mortgage){
            return ucwords($mortgage->address);
        })
        /*->editColumn('status',function($mortgage){
            return ucfirst($mortgage->status);
        })*/
        ->editColumn('created_at',function($mortgage){
            return date('d-M-y h:i a', strtotime($mortgage->created_at));
        })
        ->editColumn('updated_at',function($mortgage){
            return date('d-M-y h:i a', strtotime($mortgage->updated_at));
        })
        ->addColumn('action',function($mortgage){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$mortgage->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$mortgage->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$mortgage->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        // override global search when we concate the columns
        if ($keyword = \Request::get('search')['value']) {
                    
            $datatable->filterColumn('mortgage_name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
        }

        //------ Custom Search --------//
        /*if ($mortgage = \Request::get('mortgage')) {
            $datatable->where('name', 'like', "$mortgage%");
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
        return view('backend.pages.mortgage.create', compact('all_states'));
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
            $request->file('id_proof_file')->move('uploads/mortgage_agent/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/mortgage_agent/profile_pic/', $upload_profile_filename);
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

        $experience = array(
            'year' => $requestData['experi_year'],
            'month' => $requestData['experi_month']
        );
        $requestData['experience'] = json_encode($experience);
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
        if(Mortgage::create($requestData))
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
        $mortgage_details = Mortgage::select('tbl_mortgage_loan_officer.*', 'st.state AS state_name')
            ->where('tbl_mortgage_loan_officer.unique_id', '=', $uid)
            ->join('states AS st', 'st.state_code', '=', 'tbl_mortgage_loan_officer.state')
            ->get();

        return view('backend.pages.mortgage.view', compact('mortgage_details'));
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
        $mortgage_details = Mortgage::where('unique_id', '=', $uid)->get();
        return view('backend.pages.mortgage.edit', compact('mortgage_details', 'all_states'));
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
        $mortgage_uid = $requestData['mortgage_id'];

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
            $request->file('id_proof_file')->move('uploads/contractors/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/contractors/profile_pic', $upload_filename);
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
        unset($requestData['id_proof_file']);
        unset($requestData['mortgage_id']);
        if(Mortgage::where('unique_id', '=', $mortgage_uid)->update($requestData))
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
        $uid = $request->mortgage_id;
        if(Mortgage::where('unique_id', '=', $uid)->delete())
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
