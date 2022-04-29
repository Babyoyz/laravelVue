<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class RouteController extends Controller
{
    
    public function __construct()
    {

        // Session::put('Login', '1');



    }

    public function loginpage(){

       return view("login");
    }

    public function main_index(Request $request){

        $data = $request->session()->all();


        dd($data);
   
        // if($value != 1){

        //     return view("login");
        // }else{
        //     return view("main_index");
        // }


    }

}
