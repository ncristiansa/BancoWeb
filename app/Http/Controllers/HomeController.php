<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->get();
        return view('home')->with(compact(
            'user'
        ));
    }
    /* storeData. Guardará los datos que obtendremos del formulario mediante AJAX.
    */
    public function storeData(Request $request){
        User::where('id', Auth::guard('web')->user()->id)
        ->update([
                'iban' => $request['iban'],
                'direccion_facturacion' => $request['direccion'],
                'dni' => $request['dni']
        ]);
        
        return redirect()->route('home');
    }
}
