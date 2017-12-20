<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\User;
use App\UserEmailAddress;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)   // override this method to tweak the login logic
    {
        // The logic is to get the user_id for the user table with 'is_default=1' for email address passed
        // The 'id' is field that would be used to match in pair with the password.
        $user = UserEmailAddress::getUserIDByDefaultEmail($request->get('email'));
        return [
            'id'        => is_null($user)? -1 : $user->user_id,
            'password'  => $request->password,
        ];
    }
}
