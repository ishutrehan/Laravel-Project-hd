<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyModel as Property;
use App\Models\PropertySearchTypeModel as PropertySearchType;
use App\Models\PropertyTypeModel as PropertyType;
use App\Models\BuyerModel as Buyer;
use App\Models\SellerModel as Seller;
use DB;
use Illuminate\Support\Facades\Input;
use \Validator;
use App\User;
use Auth;
use URL;

class UserProfileController extends Controller
{
    public function index()
    {
        $user_details = array();
        if (Auth::check()) {
            // professional
            if(Auth::user()->user_type == 'buyer') {
                $row = Buyer::where('user_id', '=', Auth::user()->id)->get();
                $user_details = $row;
            }
            if(Auth::user()->user_type == 'seller') {
                $row = Seller::where('user_id', '=', Auth::user()->id)->get();
                $user_details = $row;
            }
        }

        $states = DB::table("states")->get();
        $all_states = '';
        foreach ($states as $key => $value) {
            $all_states .= "<option value='".$value->state_code."'> ".$value->state." </option>";
        }

        $custom = true;
        $title = "User Profile";
        return view('frontend.pages.profile.profile_view', compact('custom', 'title', 'user_details' , 'all_states'));
    }

    public function register(Request $request)
	{
        if ($request->isMethod('post')) {

            $rules = array(
                'name'             => 'required',                        // just a normal required validation
                'email'            => 'required|email|unique:users',     // required and must be unique in the ducks table
                'password'         => 'required',
                'password_confirm' => 'required|same:password'           // required and has to match the password field
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                $messages = $validator->messages();
                return redirect('registration')->withInput()->withErrors($validator);
            } else {
                
                User::create([
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'password' => bcrypt(Input::get('password')),
                    'user_type' => Input::get('user_type'),
                    'terms' => ($request->has('terms')) ? 'on' : 'off',
                ]);

                return redirect('registration')
                            ->withMessage('You are registered successfully.');
                
            }
        }

		return view('frontend.register');
	}
	public function home()
	{
		return view('frontend.dashboard');
	}

    public function loginPost(Request $request)
    {
        $auth = false;
        $credentials = $request->only('email', 'password');
        echo $request->has('remember');
       
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $auth = true; // Success
        }

        if ($request->ajax()) {
            return response()->json([
                'auth' => $auth,
                'intended' => URL::previous()
            ]);
        } else {
            return redirect()->intended(URL::route('dashboard'));
        }
        // return redirect(URL::route('login_page'));
    }

    public function updateUser(Request $request)
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

        if(Buyer::where('user_id', '=', $buyer_uid)->update($requestData))
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
