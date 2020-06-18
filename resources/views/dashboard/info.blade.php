@extends('layouts/app')

@section('title')
    Info Page
@endsection

@section('pagecss')
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

@endsection

@section('pagejs')

@endsection

@section('content')
<div class="container" style="margin-top: 50px;">
    <h1>Here is some information we are attempting to gather is it correct?</h1>
    <?php

    function getOS() {

        $user_agent =  $_SERVER['HTTP_USER_AGENT'];

        $os_platform    =   "Unknown OS Platform";

        $os_array       =   array(
                '/windows nt 10/i'     =>  'Windows 10',
                '/windows nt 6.3/i'     =>  'Windows 8.1',
                '/windows nt 6.2/i'     =>  'Windows 8',
                '/windows nt 6.1/i'     =>  'Windows 7',
                '/windows nt 6.0/i'     =>  'Windows Vista',
                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                '/windows nt 5.1/i'     =>  'Windows XP',
                '/windows xp/i'         =>  'Windows XP',
                '/windows nt 5.0/i'     =>  'Windows 2000',
                '/windows me/i'         =>  'Windows ME',
                '/win98/i'              =>  'Windows 98',
                '/win95/i'              =>  'Windows 95',
                '/win16/i'              =>  'Windows 3.11',
                '/macintosh|mac os x/i' =>  'Mac OS X',
                '/mac_powerpc/i'        =>  'Mac OS 9',
                '/linux/i'              =>  'Linux',
                '/ubuntu/i'             =>  'Ubuntu',
                '/iphone/i'             =>  'iPhone',
                '/ipod/i'               =>  'iPod',
                '/ipad/i'               =>  'iPad',
                '/android/i'            =>  'Android',
                '/blackberry/i'         =>  'BlackBerry',
                '/webos/i'              =>  'Mobile'
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }

        }

        return $os_platform;

    }

    function getBrowser() {

        $user_agent =  $_SERVER['HTTP_USER_AGENT'];

        $browser        =   "Unknown Browser";

        $browser_array  =   array(
                '/msie/i'       =>  'Internet Explorer',
                '/firefox/i'    =>  'Firefox',
                '/safari/i'     =>  'Safari',
                '/chrome/i'     =>  'Chrome',
                '/edge/i'       =>  'Edge',
                '/opera/i'      =>  'Opera',
                '/netscape/i'   =>  'Netscape',
                '/maxthon/i'    =>  'Maxthon',
                '/konqueror/i'  =>  'Konqueror',
                '/mobile/i'     =>  'Handheld Browser'
        );

        foreach ($browser_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }

        }

        return $browser;

    }


    $user_os        =   getOS();
    $user_browser   =   getBrowser();

    $device_details =   "<strong>Browser you are using: </strong>".$user_browser."<br /><strong>Operating System you are running: </strong>".$user_os."";

    print_r($device_details);

    echo("<br /><br /><br />".$_SERVER['HTTP_USER_AGENT']."");

    ?>

    <br/>
    <br/>
    <p>Click the button to get your coordinates.</p>

    <button onclick="getLocation()">Try It</button>

    <p id="demo"></p>
    <form id="myForm" action="{{ url('/info') }}" method="post">
        {{ csrf_field() }}
        <input id="lat" name="lat" type="text" value="" readonly>
        <input id="long" name="long" type="text" value="" readonly>
        <input id="button" name="button" type="submit" value="Find my exact location" >
    </form>


    <script>
        var x = document.getElementById("demo");
        var y = document.getElementById("lat");
        var z = document.getElementById("long");
        var button = document.getElementById("button");
        var form = document.getElementsById("target");

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
            y.value = position.coords.latitude;
            z.value=position.coords.longitude;
            document.getElementById("myForm").submit();


        }
    </script>

</div>
@endsection