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


    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'CuLocation'),getLocation(),getMap()">Current Location</button>
        <button class="tablinks" onclick="openTab(event, 'Distance')">Distance</button>
        <button class="tablinks" onclick="openTab(event, 'CarPark')">Nearest Car Parks</button>
    </div>

    <div id="CuLocation" class="tabcontent">
        <h3>Current Location</h3>
        <div class="form-group">
            <div id="geoLocation"></div>
            <div id="map-canvas" style="width: 80%; height: 100%"></div>
        </div>

    </div>

    <div id="Distance" class="tabcontent">
        <h3>Distance</h3>
        <div action=routing method= 'post' class="center" >
            <input type="text" name="username" placeholder="Enter Your Location" required="Username is required" style="margin-left:40px;margin-bottom: 10px">
            <input type="password" name="password" placeholder="Enter Your Destination" required="Password is required" style="margin-left:40px">
            <input type="submit" name="submit" value="Direction" style="width: 80%; margin-left: 40px; background: red">
        </div>
    </div>

    <div id="CarPark" class="tabcontent">
        <h3>Nearest Parking List</h3>
        <p>Tokyo is the capital of Japan.</p>
    </div>

    <script>
        function openTab(evt, ID) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(ID).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script>
        var x = document.getElementById("geoLocation");
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }



        //map page
        var y = document.getElementById("map-canvas");
        var mapLatitude;
        var mapLongitude;
        var myLatlng;

        function getMapLocation() {
            console.log("getMapLocation");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showMapPosition);
            } else {
                y.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showMapPosition(position) {
            console.log("showMapPosition");
            mapLatitude = position.coords.latitude;
            mapLongitude = position.coords.longitude;
            myLatlng = new google.maps.LatLng(mapLatitude,mapLongitude);
            getMap();
        }


        var map;
        function getMap() {

            var mapOptions = {
                zoom: 12,
                center: new google.maps.LatLng(mapLatitude, mapLongitude)
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            console.log("Done");

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title:"You are here!"
            });
        }


        //directionsPage
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        var directionsMap;
        var z = document.getElementById("directions-canvas");
        var start;
        var end;

        function getDirectionsLocation() {
            console.log("getDirectionsLocation");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showDirectionsPosition);
            } else {
                z.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showDirectionsPosition(position) {
            console.log("showDirectionsPosition");
            directionsLatitude = position.coords.latitude;
            directionsLongitude = position.coords.longitude;
            directionsLatLng = new google.maps.LatLng(directionsLatitude,directionsLongitude);
            getDirections();
        }

        function getDirections() {
            console.log('getDirections');
            directionsDisplay = new google.maps.DirectionsRenderer();
            //start = new google.maps.LatLng(directionsLatLng);
            var directionsOptions = {
                zoom:12,
                center: start
            }
            directionsMap = new google.maps.Map(document.getElementById("directions-canvas"), directionsOptions);
            directionsDisplay.setMap(directionsMap);
            calcRoute();
        }

        function calcRoute() {
            console.log("calcRoute");
            start = directionsLatLng;
            end = "50 Rue Ste-Catherine O Montréal, QC H2X 1Z6";
            var request = {
                origin:start,
                destination:end,
                travelMode: google.maps.TravelMode.TRANSIT
            };
            directionsService.route(request, function(result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(result);
                }
            });
        }

        $( document ).on( "pageshow", "#directionsPage", function( event ) {
            getDirectionsLocation();
        });

    </script>
    <!---direction block ---!>



@stop