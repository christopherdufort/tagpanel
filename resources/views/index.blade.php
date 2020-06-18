@extends('layouts/app')

@section('title')
    TagPanel
@endsection

@section('content')



    <p>Click the button to get your coordinates.</p>

    <button onclick="getLocation()">Try It</button>

    <p id="demo"></p>

    <script>
        var x = document.getElementById("demo");

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
    </script>
    <?php
            //mtl
            $lat="45.4264438";
            $long="-73.6305093";
//            //vt
//            $lat="44.479182";
//            $long="-73.206089";

//            //kigali
//            $lat="-1.971342";
//            $long="30.103157";

//            //laval
//            $lat="45.626090";
//            $long="-73.648918";
    $jsonurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=AIzaSyAQ3mMyZ8JW2d-05hTXT42oACWS1I86kZY";

    $json = file_get_contents($jsonurl);
//    $location = json_decode($json,true);
            $result =json_decode($json,true);

//    $city = $location['results'][0]['address_components'][3]['long_name']; //works?
//    $region = $location['geolocation_data']['region_name'];
    echo"<br/>";
    $location = array();

    foreach ($result['results'][0]['address_components'] as $component) {

        switch ($component['types']) {
            case in_array('street_number', $component['types']):
                $location['street_number'] = $component['long_name'];
                break;
            case in_array('route', $component['types']):
                $location['street'] = $component['long_name'];
                break;
            case in_array('sublocality', $component['types']):
                $location['sublocality'] = $component['long_name'];
                break;
            case in_array('locality', $component['types']):
                $location['locality'] = $component['long_name'];
                break;
            case in_array('administrative_area_level_2', $component['types']):
                $location['admin_2'] = $component['long_name'];
                break;
            case in_array('administrative_area_level_1', $component['types']):
                $location['admin_1'] = $component['long_name'];
                break;
            case in_array('postal_code', $component['types']):
                $location['postal_code'] = $component['long_name'];
                break;
            case in_array('country', $component['types']):
                $location['country'] = $component['long_name'];
                break;
        }

    }

            echo var_dump($location);
//            foreach($location['results'][0]['address_components'] as $component){
//                if ($component[types])
//            }
//            $region=$location['results'][0]['address_components'][4]['long_name'];
//            $country=$location['results'][0]['address_components'][5]['long_name'];
//    //    $country = $location['geolocation_data']['country_name'];
//
//            echo "You are currently in ".$city.','.$region.','.$country;

    ?>

<!--    --><?php
//
//    //$jsonurl="http://api.db-ip.com/v2/$apiKey/$ipAddress";
//    $ipaddress = $_SERVER['REMOTE_ADDR'];
//    //$ipaddress ="45.74.164.27";
//    $jsonurl = "http://api.db-ip.com/v2/532c0d1d68bc711163a1d956123feacd0db79821/".$ipaddress;
//    $json = file_get_contents($jsonurl);
//    $location = json_decode($json,true);
//    //var_dump($location);
//    $city = $location['city'];
//            if (str_contains($city,'(')){
//                $rootCity = substr($city,0, strpos($city,'('));
//            }
//            else
//                $rootCity = $city;
//    $rootCity= trim($rootCity);
//    echo "The IP you gave was ".$location['ipAddress']." returned is a city of ".$rootCity;
//    echo "<br/>";
//    echo "<br/>";
//    echo "<br/>";
//    $jsonurl = "http://where.yahooapis.com/v1/places.q('".$rootCity."')?format=json&appid=dj0yJmk9Q0pkcTF1Qm44TXdBJmQ9WVdrOVMxUnpWVk16TldVbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1lMA--";
//    $json = file_get_contents($jsonurl);
//    $location = json_decode($json,true);
//
//    //var_dump($location);
//    $woeid = $location['places']['place'][0]['woeid'];
//    $country = $location['places']['place'][0]['country'];
//    $admin1 = $location['places']['place'][0]['admin1'];
//    $latitude = $location['places']['place'][0]['centroid']['latitude'];
//    $longitude = $location['places']['place'][0]['centroid']['longitude'];
//    echo "The woeid is = ".$woeid." Located in region ".$admin1." And inside of country ".$country." with lat= ".$latitude." and long ".$longitude;
//    ?>

@endsection