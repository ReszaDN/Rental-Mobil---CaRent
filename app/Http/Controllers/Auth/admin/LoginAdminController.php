<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

class LoginAdminController extends Controller
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
    protected $guard ='AdminMiddle';
    protected $redirectTo = "/admin-home";
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard(){
        return auth()->guard('AdminMiddle');
    }

    public function index(){
        if(auth()->guard('AdminMiddle')->user()){
            return back();
        }
        return view('admin.login');
    }

    public function prosesLogin(Request $request) {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required' 
        ]);

        if(auth()->guard('AdminMiddle')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin-home');
        }

        return back()->with('loginError', 'Login Failed');
    
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');

    }
}
