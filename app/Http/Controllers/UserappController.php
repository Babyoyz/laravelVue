<?php

namespace App\Http\Controllers;

use App\Userapp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserappController extends Controller
{
 
    public $req;

    public function __construct(Request $request)
    {
        $this->req = $request->json()->all();
    }

    public  function index()
    {

        $UseModel = Userapp::Selectuserapp();

        dd($UseModel);
    }

    public function createuser()
    {

        $Username =  isset($this->req["username"]) ? $this->req["username"] : null;

        $Password = isset($this->req["password"]) ? $this->req["password"] : null;

        $FristName = isset($this->req["firstname"]) ? $this->req["firstname"] : null;

        $LastName =  isset($this->req["lastname"]) ? $this->req["lastname"] : null;

        $Email = isset($this->req["email"]) ? $this->req["email"] : null;

        $Tel = isset($this->req["tel"]) ? $this->req["tel"] : null;

        $checkUser = Userapp::checkuserid($Username);

        if ($checkUser > 0) {

            return response()->json([
                'statuscode' => '500',
                'Des' => 'Username is repeat',
            ]);
        } else {


            $checkemail = Userapp::checkemail($Email);

            if ($checkemail > 0) {

                return response()->json([
                    'statuscode' => '500',
                    'Des' => 'Email is repeat',
                ]);
            }
            $Passwordhash = Hash::make($Password, [
                'rounds' => 12
            ]);

            $arraydata = array(
                "Username" => $Username,
                "FristName" => $FristName,
                "LastName" => $LastName,
                "Tel" => $Tel,
                "Email" => $Email,
                "Password" => $Passwordhash,
            );

            $ModelInsert = Userapp::InsertUserapp($arraydata);

            if ($ModelInsert == true) {

                return response()->json([
                    'statuscode' => '200',
                    'Des' => 'register successfuly',
                ]);
            } else {

                return response()->json([
                    'statuscode' => '500',
                    'Des' => $ModelInsert,
                ]);
            }
        }
    }

    public function checklogin(){


        $Username =  isset($this->req["username"]) ? $this->req["username"] : null;

        $Password = isset($this->req["password"]) ? $this->req["password"] : null;

        $checkUser = Userapp::checkuserid($Username);
       
        if($checkUser > 0){

       
            $QuerySelect = Userapp::Selectuser($Username);

            if (Hash::check($Password, $QuerySelect->Password)) {
                
                return response()->json([
                    'statuscode' => '200',
                    'Des' => "Login Success",
                ]);
             

            }else{

                return response()->json([
                    'statuscode' => '500',
                    'Des' => "password in Correct",
                ]);
            }


        }else{

            return response()->json([
                'statuscode' => '500',
                'Des' => "No User",
            ]);
        }
    }


    public function update(Request $request, Userapp $userapp)
    {
        //
    }


    public function destroy(Userapp $userapp)
    {
        //
    }
}
