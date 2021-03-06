<?php
/**
 * Created by PhpStorm.
 * User: Damindu
 * Date: 3/1/2017
 * Time: 3:28 PM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use phpseclib\Crypt\Random;

class DBController extends Controller
{


    public static function userLogin(Request $request){


        try{
            $user =  DB::select('select * from  userlogin where username = ? and password = ? ',[$request['username'],$request['password']]);

            $register = DB::select('select * from  registerlogin where username = ? and password = ? ',[$request['username'],$request['password']]);

            $register = DB::select('select * from  registerlogin where username = ? and password = ? ',[$request['username'],$request['password']]);

            if (!empty($user)){

                session()->put(['user'=>$request['username'],'userId'=>$user[0]->ID]);
                return redirect()->route('Home');

            }

            if (!empty($register)){

                if ($request['username']=='Admin'){
                    session()->put(['user'=>$request['username'],'requestId'=>$register[0]->id]);
                    return redirect()->route('Admin');
                }
                else{
                    session()->put(['user'=>$request['username'],'requestId'=>$register[0]->id]);
                    return redirect()->route('Home');
                }

            }

            else {

                $error = 'Invalide username or password!!';
                return  view('pages.login',compact('error'));
            }
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            dd($ex->getMessage());
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




        try{
            DB::insert('insert into user (email,firstname,lastname, nic ,number, city) values (?, ?, ?, ?, ? ,?)',[$email,$firstName,$lastName,$nic,$Mobile,$city]);

            DB::insert('insert into UserLogin (username, password ) values (?, ?)',[$email,$Password]);

            $name = DB::select('select firstname from user,userLogin where userLogin.userName = user.email and userLogin.userName = ?',[$email]);

            session()->put(['user'=>$email,'userName'=>$name[0]->userName]);


            return redirect()->route('pages.user');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            dd($ex->getMessage());
        }

    }

    public function register(Request $request)
    {
        $companyname= $request['comapanyname'];
        $loaction  = $request['location'];
        $address=$request['address'];
        $conumber=$request['conumber'];
        $Mobile=$request['mobnumber'];
        $email = $request['email'];
        $pass = str_random(15);
        str_replace(",","#",$loaction);



        try{
            $user = new User()
            DB::insert('insert into register (companyname,location, address ,conumber, mobnumber,email) values ( ?, ?, ?, ? ,?,?)',[$companyname,$loaction,$address,$conumber,$Mobile,$email]);

            DB::insert('insert into registerlogin (username,password) values (?, ?)',[$companyname,$pass]);

            Mail::send('mailers',array())

            return view('pages.login');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            dd($ex->getMessage());
        }




    }

}