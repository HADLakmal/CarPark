
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

    <div class="form_wrapper">
        <h2>Login from here</h2>
        <form action=userLogin method='post'>
            {{ csrf_field() }}
            <input type="text" name="username" placeholder="Enter Username" required="Username is required">
            <input type="password" name="password" placeholder="Enter Password" required="Password is required">
            <input type="submit" name="submit" value="Login">

            <input type="checkbox" name="remember" value="remember me">Remember me
            <a href="">forget passowd?</a>
        </form>
        {{$error}}
    </div>

@stop
