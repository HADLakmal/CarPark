<?php
/**
 * Created by PhpStorm.
 * User: Damindu
 * Date: 3/1/2017
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{


    public static function userLogin(Request $request){

        $user =  DB::select('select * from  userlogin where username = ? and password = ? ',[$request['username'],$request['password']]);
        if (empty($user)){

            $error = 'Invalide username or password!!';


            return  view('pages.login',compact('error'));

        }
        else {
            return redirect()->route('user');
        }
    }

}