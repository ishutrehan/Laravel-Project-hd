<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\ProfessionalModel as Professional;
use Hash;
use DB;
use Response;
use \Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.professional.index');
    }
    
    public function create()
    {
        $states = DB::table("states")->get();
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }
        return view('backend.pages.professional.create', compact('all_states'));
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
            $request->file('id_proof_file')->move('uploads/professional/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/professional/profile_pic/', $upload_profile_filename);
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

        $find1 = array('(', ') ', '-');
        $replace1 = array('');
        $requestData['telephone'] = str_replace($find1, $replace1, $requestData['telephone']);
        $find2 = array('-');
        $replace2 = array('');
        $requestData['mobile'] = str_replace($find2, $replace2, $requestData['mobile']);
        $requestData['unique_id'] = md5(strtotime(date('Y-m-d H:i:s')).time());
        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['id_proof_attachment'] = json_encode($id_proof_attachment);

        $rules = array(
            'name'             => 'required|string|unique:users',                        // just a normal required validation
            'email'            => 'required|email|unique:users',     // required and must be unique in the ducks table
            'password'         => 'required',
            'password_confirm' => 'required|same:password'           // required and has to match the password field
        );
        $data = array(
                    'name' => $requestData['username'],
                    'email' => $requestData['email'],
                    'password' => $requestData['confirm_pass'],
                    'password_confirm' => $requestData['confirm_pass'],
                    'user_type' => 'professional'
                );

        $validator = Validator::make($data, $rules);
        $messages = $validator->messages();
        $data['password'] = bcrypt($data['password']);
       
        $return = array('status' => 0);   

        if ($validator->fails()) {
           return $validator->messages()->toJson();
        } else { 
            $uid = User::create($data)->id;
            $requestData['user_id'] = $uid;
            if(Professional::create($requestData)) {
                $return =  array('status' => 1);
            }
            else {
                $return = array('status' => 0);   
            }
        }
        
        return json_encode($return);
    }

    public function professional_datatable()
    {
        $professional = Professional::select([
            'unique_id',
            'user_id',
            'profile_pic',
            \DB::raw("CONCAT(first_name,' ',last_name) as name"),
            'address',
            'email',
            'created_at',
            'updated_at'
        ]);

        // datatable for realtors
        $datatable = Datatables::of($professional)
        ->editColumn('profile_pic',function($professional){
            $profile_pic = json_decode($professional->profile_pic, true);
            return "<img src='".url('uploads/professional/profile_pic')."/".$profile_pic['upload_filename']."' style='width:50px;' />";
        })
        ->editColumn('name',function($professional){
            return ucwords($professional->name);
        })
        ->editColumn('address',function($professional){
            return ucwords($professional->address);
        })
        ->editColumn('created_at',function($professional){
            return date('d-M-y h:i a', strtotime($professional->created_at));
        })
        ->editColumn('updated_at',function($professional){
            return date('d-M-y h:i a', strtotime($professional->updated_at));
        })
        ->addColumn('action',function($professional){
            return '<div class="box-tools" style="width:75px"><a class= "btn btn-xs btn-info view"  id="view-'.$professional->user_id.'" style="border-radius: 0px;" data-toggle="tooltip" title="View"><i class="glyphicon glyphicon-eye-open"></i></a><button type="button" class= "btn btn-xs btn-primary edit"  id="edit-'.$professional->user_id.'" data-toggle="tooltip" title data-original-title="edit" style="border-radius: 0px;"><i class="glyphicon glyphicon-edit"></i></button><button class= "btn btn-xs btn-danger delete" id="Deleted-'.$professional->user_id.'" data-toggle="tooltip" title data-original-title="Delete" style="border-radius: 0px;"><i class="glyphicon glyphicon-trash"></i></button></div>';
        });

        // override global search when we concate the columns
        if ($keyword = \Request::get('search')['value']) {                    
            $datatable->filterColumn('name', 'whereRaw', "CONCAT(first_name,' ',last_name) like ?", ["%$keyword%"]);
        }

        if ($date_range = \Request::get('date_range')) {
            $dates = explode(" - ", $date_range);
            $datatable->whereBetween('created_at', array(trim($dates[0]), trim($dates[1])))
                    ->orWhere(function($query) use ($dates){
                        $query->whereBetween('updated_at', array(trim($dates[0]), trim($dates[1])));
                    });
        }

        return $datatable->make(true);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $uid = $request->realtor_id;
        if(Professional::where('user_id', '=', $uid)->delete())
        {
            User::where('id', '=', $uid)->delete();
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
        $professional_details = DB::table("tbl_professionals")
                ->join('states', 'states.state_code', '=', 'tbl_professionals.state')
                ->join('states as ts', 'ts.state_code', '=', 'tbl_professionals.licensed_state')
                ->join('cities_extended', 'cities_extended.id', '=', 'tbl_professionals.city')
                ->select('tbl_professionals.*', 'states.state AS state_name', 'cities_extended.city AS city_name', 'ts.state AS lstate_name')
                ->where('user_id', '=', $uid)
                ->get();
        
        return view('backend.pages.professional.view', compact('professional_details'));
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
        $professional_details = Professional::where('user_id', '=', $uid)->get();
        return view('backend.pages.professional.edit', compact('professional_details', 'all_states'));
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
        $user_id = $requestData['professional_id'];

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
            $request->file('id_proof_file')->move('uploads/professional/id_proof', $upload_filename);
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
            $request->file('profile_pic')->move('uploads/professional/profile_pic', $upload_pic_filename);
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

        unset($requestData['professional_id']);
        unset($requestData['id_proof_file']);
        if(Professional::where('user_id', '=', $user_id)->update($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);
    }

    public function UpdatePassword(Request $request)
    {
        $requestData = $request->all();
        $user_id = $requestData['uid'];
        $requestData['password'] = bcrypt($requestData['password']);
        unset($requestData['confirm_pass']);
        unset($requestData['uid']);

        if(User::where('id', '=', $user_id)->update($requestData))
        {
            $return =  array('status' => 1);
        }
        else
        {
            $return =  array('status' => 0);   
        }
        return json_encode($return);   
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

}
