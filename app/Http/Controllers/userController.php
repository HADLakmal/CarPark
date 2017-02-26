<?php
/**
 * Created by PhpStorm.
 * User: Damindu
 * Date: 2/24/2017
 * Time: 11:58 AM
 */

namespace App\Http\Controllers;


class userController extends Controller
{

    public static  function userLogin($request){

        if(($request['username'])=='admin'){
            $user =  DB::select('select * from  staff where Role = ? and Staff_Id = ? ',[$request['username'],$request['password']]);
            session()->put(['user'=>$request['username'],'ID'=>$user[0]->Staff_Id]);
            return redirect()->route('dashboard');
        }
        elseif ($request['username']!='admin'){
            $user =  DB::select('select username,password from userLogin where userName = ? and password = ? ',[$request['username'],$request['password']]);

            if (empty($user)){

                $error = 'Invalide username or password!!';


                return  view('login',compact('error'));

            }
            else {

                $id = DB::select('select customerId from customer,userLogin where userLogin.username = customer.Email and userLogin.username = ?',[$request['username']]);

                session()->put(['user'=>$request['username'],'customerId'=>$id[0]->customerId]);


                return redirect()->route('dashboard');

            }

        }
        else{
            return redirect()->route('login');
        }







    }
}