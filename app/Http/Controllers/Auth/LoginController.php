<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

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

    public function autentica() {

        $input     = Input::all();
        $cpf       = Input::get('cpf');
        $placa     = Input::get('placa');
        

        $t = User::where('cpf','=',$cpf)->where('placa', '=', $placa)->get();
        
        
        if(isset($t[0])){
            if (Auth::loginUsingId($t[0]->id)) 
            {
                return redirect()->intended('home');
            }
            else
            {
                 return redirect()->intended('login')->with('status', 'Invalid Login Credentials !');
            }
        }
        else return redirect()->intended('login')->with('status', 'Invalid Login Credentials !');

    }

}
