@extends('pages.home')

@section('header')
    Car Parking System
    <nav>

        <ul>

            <li><a href="signIn">Sign IN</a></li>
            <li><a href="register">Register</a></li>
            <li><a href="about">About us</a></li>
            <li><a href="">Contact us</a></li>

        </ul>
    </nav>

@stop

@section('content')

    <div style="margin-top: 5% " action=routing method= 'post' class="center" >
        <h2 style="font-family: 'Raleway', sans-serif;margin-bottom: 5% ">user Register</h2>
        <div>Company name</div>
        <input type="text" name="comapanyname" placeholder="Enter Your company name" required="companyname is required" style="margin-left:40px;margin-bottom: 10px">

        <div>Location</div>
        <input type="text" name="location" placeholder="Enter Your Location" required="location is required" style="margin-left:40px;margin-bottom: 10px">

        <div>Address</div>
        <input type="text" name="address" placeholder="Enter Your address " required="address is required" style="margin-left:40px;margin-bottom: 10px">

        <div>Company Number</div>
        <input type="text" name="conumber" placeholder="Enter Your company number" required="conumber is required" style="margin-left:40px;margin-bottom: 10px">

        <div>Mobile Number</div>
        <input type="text" name="mobnumber" placeholder="Enter Your mobile number" required="mobnumber is required" style="margin-left:40px;margin-bottom: 10px">


        <input type="submit" name="submit" value="Register request" style="width: 40%; margin-left: 30%; background: red">
    </div>
@stop