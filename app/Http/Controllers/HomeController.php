<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection as Collection;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id_user =Auth::user()->id; 
        $datareal = DB::selectone("select * from users inner join persona on num_doc = pid where id='$id_user'");
        $array = json_decode( json_encode( $datareal ), true );
        $cod=$array['codid'];
        $name=$array['nombres'];
        $email=$array['email'];
        $dni=$array['pid'];


        // $pruebasesion ="HolaSesion";
        session(['fullname' => $name]);
        session(['codigo' => $cod]);
        session(['email' => $email]);
        return view('home');
    }
}
