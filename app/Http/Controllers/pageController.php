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
}
