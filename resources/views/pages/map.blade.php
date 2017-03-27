<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<button onclick="initMap()"> press</button>
<div id="map"></div>
<script>
    function initMap() {
        var uluru = {lat: 6.7970079, lng: 79.9000628};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmDyfNoVy0qigSbK-Cp2PifbE_vyOyDGY">
</script>
</body>
</html>