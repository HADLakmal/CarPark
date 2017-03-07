@extends('pages.home')

@section('header')
    <li class="welcome">Welcome {{ session()->get('user') }} </li>

    <nav>
        <ul>
            <li><a href="user.blade.php">Home</a></li>

            <li><a href="map">Map</a></li>
            <li><a href="contact">Contact us</a></li>
            <li><a href="logout">Log Out</a></li>


        </ul>
    </nav>
@stop

@section('content')

    <div action = routing method = 'post' style="width: 80%; margin: 10% auto">
        <div action=routing method= 'post' class="center" >
                <input type="text" name="username" placeholder="Enter Your Location" required="Username is required" style="margin-left:40px;margin-bottom: 10px">
                <input type="password" name="password" placeholder="Enter Your Destination" required="Password is required" style="margin-left:40px">
                <input type="submit" name="submit" value="Direction" style="width: 80%; margin-left: 40px; background: red">
        </div>
    </div>
@stop