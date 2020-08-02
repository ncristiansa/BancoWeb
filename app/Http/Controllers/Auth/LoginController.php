<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

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
    public function login(){
        return view('auth.login');
    }
    public function checkUser(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $email = $request['email'];
        $password = $request['password'];
        if(Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])){
            //dd($request['email'], $request['password']);
            return redirect()->action('HomeController@index');
        }
        return back()->withInput($request->only('email', 'password'));
    }
    public function register(Request $request){
        return view('auth.register');
    }
    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required|email',
            'telefono' => 'required|min:9',
            'password' => 'required|min:8',
        ]);
        User::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'password' => Hash::make($request['password'])
        ]);
        if(Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])){
            /* dd('aqui'); */
            return redirect()->action('HomeController@index');
        }
        return back()->withInput($request->only('nombre', 'apellidos', 'email', 'telefono','password'));
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}
