<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   /*  protected function authenticated($user){
        if($user->user_role == 'admin'){
            return redirect()->intended('admin.index'); //redirect to admin panel
        }
        return redirect()->intended('/home'); //redirect to standard user homepage
    }
 */
        protected $redirectTo = '/home';

        protected function redirectTo()
        {
            if (auth()->user()->user_role == 1) {
                return '/admin';
            }
            return '/home';
        }
}
