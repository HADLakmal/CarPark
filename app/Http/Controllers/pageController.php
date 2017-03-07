<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class pageController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function login(){
        $error = "";
        return view('pages.login',compact('error'));
    }

    public function user(){
        return view('pages.user')->with(['massage'=>'']);
    }

    public function map(){
        return view('pages.direction');
    }
}
