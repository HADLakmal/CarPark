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
        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 30%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }

            #infowindow-content .title {
                font-weight: bold;
            }

            #infowindow-content {
                display: none;
            }

            #map #infowindow-content {
                display: inline;
            }

            .pac-card {
                margin: 10px 10px 0 0;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                background-color: #fff;
                font-family: Roboto;
            }

            #pac-container {
                padding-bottom: 12px;
                margin-right: 12px;
            }

            .pac-controls {
                display: inline-block;
                padding: 5px 11px;
            }

            .pac-controls label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }

            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 400px;
                height: 30px;
            }

            #pac-input:focus {
                border-color: #4d90fe;
            }

            #title {
                color: #fff;
                background-color: #4d90fe;
                font-size: 25px;
                font-weight: 500;
                padding: 6px 12px;
            }
            #target {
                width: 345px;
            }
        </style>

        <div>Location</div>
        <input type="text" id="pac-input"  class="controls" placeholder="Enter Your Location" required="pac-input is required" >

        <div id="map"></div>

        <form action="submitregister" method="post">
            {{ csrf_field() }}

            <div style="margin-top: 0%" action=routing method= 'post' class="center" >
                <h2 style="font-family: 'Raleway', sans-serif;margin-bottom: 5% ">user Register</h2>
                <div>Company name</div>
                <input type="text" name="comapanyname" placeholder="Enter Your company name" required="companyname is required" style="margin-left:40px;margin-bottom: 10px">

                <div>Email</div>
                <input type="email" name="email" placeholder="Enter Your Email" required="email is required" style="margin-left:40px;margin-bottom: 10px">
                <div>Location</div>
                <input type="text" id="location" name="location"  VALUE="Enter your location above map" readonly  placeholder="Enter Your Location" required="location is required" style="margin-left:40px;margin-bottom: 10px">

                <div>Address</div>
                <input type="text" name="address" placeholder="Enter Your address " required="address is required" style="margin-left:40px;margin-bottom: 10px">

                <div>Company Number</div>
                <input type="text" name="conumber" placeholder="Enter Your company number" required="conumber is required" style="margin-left:40px;margin-bottom: 10px">

                <div>Mobile Number</div>
                <input type="text" name="mobnumber" placeholder="Enter Your mobile number" required="mobnumber is required" style="margin-left:40px;margin-bottom: 10px">

                <input type="submit" onclick="getInput()" name="submit" value="Register request" style="width: 40%; margin-left: 30%; background: red">
            </div>
        </form>

    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var x = document.getElementById('location');
        function getInput() {

                x.value = document.getElementById('pac-input').value;
                console.log(x.value);


        }
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 6.79079200000000, lng: 79.9002103},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmDyfNoVy0qigSbK-Cp2PifbE_vyOyDGY&libraries=places&callback=initAutocomplete"
            async defer></script>
@stop