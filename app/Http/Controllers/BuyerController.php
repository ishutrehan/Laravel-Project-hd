<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\BuyerModel as Buyer;
use Hash;
use DB;
use Redirect;
use Response;

class BuyerController extends Controller
{
    public function index()
    {
        // return "hello";exit;
        return view('backend.pages.buyers.index');
    }

    // fetch record in datatable for mortgage loan officer
    public function buyers_datatable()
    {
        $buyers = Buyer::select([
            'unique_id',
            'profile_pic',
            \DB::raw("CONCAT(first_name,' ',last_name) as buyers_name"),
            'address',
            'email',
            'created_at',
            'updated_at'
        ]);

        $datatable = Datatables::of($buyers)
            ->editColumn('profile_pic',function($buyers){
                $profile_pic = json_decode($buyers->profile_pic, true);
                return "<img src='".url('uploads/buyer/profile_pic')."/".$profile_pic['upload_filename']."' style='width:50px;' />";
            })
            ->editColumn('buyers_name',function($buyers){
                return ucwords($buyers->buyers_name);
            })
            ->editColumn('address',function($buyers){
                return ucwords($buyers->address);
            })
            /*->editColumn('status',function($buyers){
                return ucfirst($buyers->status);
            })*/
            ->editColumn('created_at',function($buyers){
                return date('d-M-y h:i a', strtotime($buyers->created_at));
            })
            ->editColumn('updated_at',function($buyers){
                return date('d-M-y h:i a', strtotime($buyers->updated_at));
            })
            ->addColumn('action',function($buyers){
                return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$buyers->unique_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$buyers->unique_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$buyers->unique_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
            });

        // override global search when we concate the columns
        if ($keyword = \Request::get('search')['value']) {

            $datatable->filterColumn('buyers_name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
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
        return view('backend.pages.buyers.create', compact('all_states'));
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
        // dd($requestData);exit;
        if(isset($requestData['id_proof_file']) && $request->hasFile('id_proof_file'))
        {
            $original_filename = $requestData['id_proof_file']->getClientOriginalName();
            $upload_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('id_proof_file')->getClientOriginalExtension();
            $request->file('id_proof_file')->move('uploads/buyer/id_proof', $upload_filename);
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

        if(isset($requestData['profile_pic']) && $request->hasFile('profile_pic'))
        {
            $original_pic_filename = $requestData['profile_pic']->getClientOriginalName();
            $upload_pic_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('profile_pic')->getClientOriginalExtension();
            $request->file('profile_pic')->move('uploads/buyer/profile_pic', $upload_pic_filename);
            $profile_pic_atchmnt = array(
                'original_filename' => $original_pic_filename,
                'upload_filename' => $upload_pic_filename
            );
            $requestData['profile_pic'] = json_encode($profile_pic_atchmnt);
        }
        else
        {
            $requestData['profile_pic'] = '';
        }

        if(isset($requestData['fund_proof_attachment']) && $request->hasFile('fund_proof_attachment'))
        {
            $original_filename1 = $requestData['fund_proof_attachment']->getClientOriginalName();
            $upload_filename1 = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('fund_proof_attachment')->getClientOriginalExtension();
            $request->file('fund_proof_attachment')->move('uploads/buyer/fund_proof', $upload_filename1);
            $fund_proof_attachment = array(
                'original_filename' => $original_filename1,
                'upload_filename' => $upload_filename1
            );
            $requestData['fund_proof_attachment'] = json_encode($fund_proof_attachment);
        }
        else
        {
            $requestData['fund_proof_attachment'] = '';
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
        if(Buyer::create($requestData))
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
        $buyer_details = DB::table("tbl_buyers")
            ->join('states', 'states.state_code', '=', 'tbl_buyers.state')
            ->join('cities_extended', 'cities_extended.id', '=', 'tbl_buyers.city')
            ->select('tbl_buyers.*', 'states.state AS state_name', 'cities_extended.city AS city_name')
            ->where('unique_id', '=', $uid)
            ->get();
       
        return view('backend.pages.buyers.view', compact('buyer_details'));
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
        $buyer_details = Buyer::where('unique_id', '=', $uid)->get();
         //dd($buyer_details[0]);
        return view('backend.pages.buyers.edit', compact('buyer_details', 'all_states'));
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
        $buyer_uid = $requestData['buyer_id'];

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
            $request->file('id_proof_file')->move('uploads/buyer/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/buyer/profile_pic', $upload_filename);
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

        // upload fund proof Attachment
        if (isset( $requestData['fund_proof_attachment']) && $request->hasFile('fund_proof_attachment'))
        {
            $original_pic_filename = $requestData['fund_proof_attachment']->getClientOriginalName();
            $upload_pic_filename = md5(time().strtotime(date('Y-m-d H:i:s'))).'.'.$request->file('fund_proof_attachment')->getClientOriginalExtension();
            $request->file('fund_proof_attachment')->move('uploads/buyer/fund_proof', $upload_filename);
            $fund_proof_attachment = array(
                'original_filename' => $original_pic_filename,
                'upload_filename' => $upload_pic_filename
            );
            $requestData['fund_proof_attachment'] = json_encode($fund_proof_attachment);
        }
        else
        {
            unset($requestData['fund_proof_attachment']);
        }

        unset($requestData['buyer_id']);
        unset($requestData['id_proof_file']);
        //dd($requestData);
        if(Buyer::where('unique_id', '=', $buyer_uid)->update($requestData))
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
        $uid = $request->buyer_id;
        if(Buyer::where('unique_id', '=', $uid)->delete())
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
        $file = "/buyer/".$file;
        return Response::download($file);
    }*/
}
