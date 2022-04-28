<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Userapp extends Model
{

    public static function Selectuserapp(){

        $userapp = DB::table('db_userapp')->get();
 
        return $userapp;

    }

    public static function checkuserid($username){

        $checkuserid = DB::table("db_userapp")
        ->where("Username", "=", "{$username}")
        ->count();
        return $checkuserid;
    }

    public static function checkemail($Email){
        $checkEmail = DB::table("db_userapp")
        ->where("Email", "=", "{$Email}")
        ->count();
        return $checkEmail;
    }

    public static function InsertUserapp($params){


      $insert =   DB::table('db_userapp')->insert(
            ['Username' => $params["Username"],
            'Password' => $params["Password"],
            'Leveluser' => 2,
            'FristName' => $params["FristName"],
            'LastName' => $params["LastName"],
            'Email' => $params["Email"],
            'Tel' => $params["Tel"]
            ]
        );

        return $insert;

    }

    public static function Selectuser($Username){

        $Selectuser = DB::table("db_userapp")
        ->where("Username", "=", "{$Username}")
        ->first();

        return $Selectuser;

    }

}


