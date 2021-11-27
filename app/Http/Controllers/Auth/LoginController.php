<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        //validate the from data
        $this->validate($request, [
            'phone_number' => 'required',
            'password' => 'required|min:6'
        ]);

        //attempt to log the user in
        if(Auth::guard('web')->attempt(['phone_number' => $request->phone_number, 'password' => $request->password])){
            //if successfull, then redirect to teir intended location
            return redirect()->intended(route('dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('phone_number'));
      }


    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
