<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

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
    protected $redirectTo = 'company/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('guest:company')->except('logout');

    }

    protected function guard()
    {
        return Auth::guard('company');
    }

    public function showLoginForm()
    {
        return view('company.auth.login');
    }

    public function login (Request $request)
    {
        // $email = $request->company_email;
        // $password = $request->company_password;
        // dd($email . $password);
    
        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('company.home');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが違います',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('company.login'));
    }
    
  
}
