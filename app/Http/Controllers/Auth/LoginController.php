<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'logout']);
    }
    public function login()
    {

        $email = Input::get('email');
        $password = Input::get('password');
        return $this->authenticate($email, $password);
    }

    public function authenticate($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password'=>$password])) {
            // Authentication passed...
            return redirect()->intended('/admin');
        } else {
            return back()->withErrors(['Wrong Login Detail Contact Customer care or Account Blocked', 'Wrong Login Detail Contact Customer care']);
        }
    }
}
