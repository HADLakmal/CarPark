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
            session()->put(['user'=>$request['username'],'customerId'=>$user[0]->ID]);
            return redirect()->route('Home');
        }
    }

    public function signIn(Request $request)
    {
        $firstName= $request['inputFirstName'];
        $lastName = $request['inputLastName'];
        $city=$request['inputTown'];
        $nic=$request['inputNic'];
        $Mobile=$request['inputMobile'];
        $email=$request['inputEmail'];
        $Password=$request['inputPassword'];


        DB::insert('insert into user (email,firstname,lastname, nic ,number, city) values (?, ?, ?, ?, ? ,?)',[$email,$firstName,$lastName,$nic,$Mobile,$city]);

        DB::insert('insert into UserLogin (username, password ) values (?, ?)',[$email,$Password]);

        $name = DB::select('select firstname from user,userLogin where userLogin.userName = user.email and userLogin.userName = ?',[$email]);

        session()->put(['user'=>$email,'userName'=>$name[0]->userName]);


        return redirect()->route('pages.user');

    }

}