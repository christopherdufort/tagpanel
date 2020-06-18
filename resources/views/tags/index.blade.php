@extends('layouts/app')

@section('title')
    {{$city}} | TagPanel
@endsection

@section('pagecss')
    <!-- Custom styling plus plugins -->
    {{--<link href="{{ asset('/build/css/custom.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/build/css/mediagallery.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/panels.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/reaction.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('/css/style.css') }}" rel="stylesheet">--}}
@endsection

@section('pagejs')
@endsection

@section('content')
    <?php
    //$jsonurl = "http://where.yahooapis.com/v1/places.q('".$tags[0]['city']."')?format=json&appid=dj0yJmk9Q0pkcTF1Qm44TXdBJmQ9WVdrOVMxUnpWVk16TldVbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1lMA--";
    //$jsonurl = "http://where.yahooapis.com/v1/places.q('".$city."')?format=json&appid=dj0yJmk9Q0pkcTF1Qm44TXdBJmQ9WVdrOVMxUnpWVk16TldVbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1lMA--";
    $jsonurl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($city) . ',' . urlencode($region) . ',' . urlencode($country) . "&key=AIzaSyBVBS0UUI4hYGyySnat1jltYysa1Qhl2w4";
    //$jsonurl ="https://maps.googleapis.com/maps/api/geocode/json?address=".$city."&key=AIzaSyBVBS0UUI4hYGyySnat1jltYysa1Qhl2w4";
    $json = file_get_contents($jsonurl);
    $location = json_decode($json, true);
    //echo "https://maps.googleapis.com/maps/api/geocode/json?address=".$city.' '.$region.' '.$country."&key=AIzaSyBVBS0UUI4hYGyySnat1jltYysa1Qhl2w4";
    //var_dump($location);
    //$woeid = $location['places']['place'][0]['woeid'];
    //$city = $location['places']['place'][0]['name'];
    //$country = $location['places']['place'][0]['country'];
    //$province = $location['places']['place'][0]['admin1'];
    //$latitude = $location['places']['place'][0]['centroid']['latitude'];
    //$longitude = $location['places']['place'][0]['centroid']['longitude'];
    $placeID = $location['results'][0]['place_id'];
    $city = $location['results'][0]['address_components'][0]['long_name'];
    $country = $country;
    $province = $region;
    $latitude = "latitude";
    $longitude = "longitude";
    ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Section -->
        <div class="row tagpanel-banner">
            {{--<div class="col-lg-12" style="text-align: center; background-image: url('https://s31.postimg.org/6in265quj/banner.png');background-repeat: no-repeat;">--}}
            <div class="col-lg-12" style="text-align: center;">
                {{--<h1 class="page-header tagpanel-header">Rate what you are experiencing now and share it with your community!</h1>--}}
                <h2 class="page-header tagpanel-header">Discover and get inspired by what your community loves.</h2>
            </div>
        </div>
        <!-- /.row -->

        <div class="row" style="text-align: center">
            <form class="form-inline" method="post" action="{{ url('/panels/search')}}">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <input type="hidden" name="currentCity" value="{{$city}}">
                    <input type="hidden" name="currentRegion" value="{{$province}}">
                    <input type="hidden" name="currentCountry" value="{{$country}}">
                    <table id="address">
                        <tr>
                            <input type="hidden" class="field" name="city" id="locality"></td>
                        </tr>
                        <tr>
                            <input type="hidden" class="field" name="region" id="administrative_area_level_1"></td>
                        </tr>
                        <tr>
                            <input type="hidden" class="field" name="country" id="country"></td>
                        </tr>
                    </table>
                    {{--<input type="text" class="form-control" name="searchCity" placeholder="{{$city}}" value="{{$city}}">--}}
                    <div id="locationField">
                        <input id="autocomplete" class="form-control tagpanel-spacing" name="searchCity"
                               placeholder="Enter community name" onFocus="geolocate()" type="text" onkeydown="if (event.keyCode == 13) {return false;}">

                        <select name="searchCategory" class="form-control selectpicker tagpanel-spacing">
                            <option value="" disabled selected hidden>Select a category</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            @endif
                        </select>
                        {{--<input type="text" class="form-control" name="category" placeholder="Any Category">--}}
                        <button type="submit" class="btn btn-success tagpanel-spacing"><span class="glyphicon glyphicon-search"></span>
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> {{$city}}
                    <small>{{$province.', '.$country}}</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/panels') }}">Panels</a></li>
                    <li><a href="{{ url('/panels/'.$country) }}">{{$country}}</a></li>
                    <li><a href="{{ url('/panels/'.$country.'/'.$province) }}">{{$province}}</a></li>
                    <li class="active">{{$city}}</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!--Demo Grid-->
        {{--<div class="col-md-4 col-sm-6 col-lg-4">--}}
            {{--<div class="square bg img1">--}}
                {{--<div class="content">--}}
                    {{--Centered responsive images as background with content over it.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-sm-6 col-lg-4">--}}
            {{--<div class="square bg img2">--}}
                {{--<div class="content">--}}
                    {{--Again--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4 col-sm-6 col-lg-4">--}}
            {{--<div class="square bg img3">--}}
                {{--<div class="content">--}}
                    {{--And again--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <script type="text/javascript">
            function sendIt($id)
            {
                        <?php
                        if (!Auth::check())
                        {
                            echo "window.location = 'http://www.tagpanel.com/login';";
                        }
                        ?>
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        {{--document.getElementById("{{$tag->tag_id}}").innerHTML = xhttp.responseText;--}}
                        document.getElementById($id).innerHTML = xhttp.responseText;
                    }
                };
                {{--xhttp.open("GET", "../tags/like/{{$tag->tag_id}}", true);--}}
                xhttp.open("GET", "../../../tags/like/"+$id, true);
                xhttp.send();
            }
        </script>
        <div class="row">
            @if($tags)
                @foreach($tags as $tag)
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="thumbnail">
                            <div>
                                <a title="Visit Profile" class="tagpanel-profile-link" href="{{ url('/profile/'.$tag->username) }}"><p style="font-size: 15px; display:inline">
                                        <img class="fb-image-profile round-border tagpanel-thumbnail tagpanel-profile-thumbnail" src="{{ URL::to('/') }}{{'/'.$tag['profile_path']}}" alt="Profile Thumbnail Image" style="padding-right:0px; height: 32px; width: 32px;"/>
                                        {{ $tag->name}}</p>
                                </a>

                                <span class="tagpanel-date">{{$tag->created_at->format('M-d') }}</span>
                            </div>
                            <a href="{{ url('tags/'.$tag->tag_id) }}">
                                <div class="image view view-first">
                                    {{--<img style="width: 100%; display: block;"--}}
                                    {{--src="{{ URL::to('/') }}{{'/'.$tag['media_path']}}" alt="image">--}}
                                    <div class="square bg"
                                         style="background-image: url({{ URL::to('/') }}{{'/'.$tag['media_path']}})">
                                        <div class="content">
                                        </div>
                                    </div>
                                    <div class="mask pointer">
                                        <p></p>
                                        <div class="tools tools-bottom">
                                            {{$tag->title}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="caption">
                                <!-- Load Facebook SDK for JavaScript -->
                                <div id="fb-root"></div>
                                <script>(function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>

                                <!-- Your share button code -->
                                {{--<div class="fb-share-button" data-href="http://tagpanel.com/tags/6" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftagpanel.com%2Ftags%2F6&amp;src=sdkpreparse">Share</a></div>--}}
                                <div class="facebook-reaction"><!-- container div for reaction system -->
                                    <button class="tagpanel-remove-button" onclick="sendIt({{$tag->tag_id}})" title="Love It"><span class="glyphicon glyphicon-heart tagpanel-social"></span></button><span id="{{$tag->tag_id}}"class="tagpanel-count">{{$tag->like_count}}</span>
                                    {{--<a title="Love It" href="{{ url('/tags/like/'.$tag->tag_id) }}"><span--}}
                                                {{--class="glyphicon glyphicon-heart tagpanel-social"></span></a><span--}}
                                            {{--class="tagpanel-count">{{$tag->like_count}}</span>--}}
                                    <span class="like-btn"> <!-- Share -->
                                        <span title="Share"
                                              class="like-btn-emo glyphicon glyphicon-share-alt tagpanel-social"></span>
                                        <!-- Default like button emotion-->
                                        {{--<span class="like-btn-text">Share</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->--}}
                                        <ul class="reactions-box"> <!-- Reaction buttons container-->
                                              <a class="fb-xfbml-parse-ignore" target="_blank"
                                                 href="https://www.facebook.com/sharer/sharer.php?u=http://www.tagpanel.com/tags/{{$tag->tag_id}}"
                                                 onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li
                                                          class="reaction reaction-facebook"
                                                          data-reaction="Facebook"></li></a>
                                              <a class="twitter-share-button" target="_blank"
                                                 href="https://twitter.com/intent/tweet?hashtags=TagPanel&url=http://www.tagpanel.com/tags/{{$tag->tag_id}}"
                                                 onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li
                                                          class="reaction reaction-twitter"
                                                          data-reaction="Twitter"></li></a>
                                              <a href="https://plus.google.com/share?url={http://www.tagpanel.com/tags/{{$tag->tag_id}}}"
                                                 onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li
                                                          class="reaction reaction-googleplus"
                                                          data-reaction="Google+"></li></a>
                                              <a href="https://www.pinterest.com/pin/create/button/?url=http://www.tagpanel.com/tags/{{$tag->tag_id}}&media={{ URL::to('/') }}{{'/'.$tag['media_path']}}&description={{$tag->description}}"
                                                 onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li
                                                          class="reaction reaction-pinterest"
                                                          data-reaction="Pinterest"></li></a>
                                              <a href="https://www.linkedin.com/shareArticle?url=http://www.tagpanel.com/tags/{{$tag->tag_id}}"
                                                 onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li
                                                          class="reaction reaction-linkedin"
                                                          data-reaction="Linkedin"></li></a>
                                            {{--<li class="reaction reaction-email" data-reaction="Email"></li>--}}
                                          </ul>
                                    </span><span class="tagpanel-count">{{$tag->share_count}}</span>
                                    <div style="float:right">
                                        <i class="glyphicon glyphicon-star tagpanel-social tagpanel-gold-hover">{{$tag->rating}} </i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
        @endif

        {{--<!-- /.row -->--}}
        {{--<div class="row">--}}
        {{--@if($tags)--}}
        {{--@foreach($tags as $tag)--}}
        {{--<div class="col-md-4 col-sm-6 col-lg-4">--}}
        {{--<a href="portfolio-item.html">--}}
        {{--<img class="img-responsive img-portfolio img-hover" src="{{ URL::to('/') }}{{'/'.$tag['media_path']}}" alt="event pic">--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--</div>--}}
        {{--@endif--}}

    </div>
    <!-- /.container -->

    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        //        // Bias the autocomplete object to the user's geographical location,
        //        // as supplied by the browser's 'navigator.geolocation' object.
        //        function geolocate() {
        //            if (navigator.geolocation) {
        //                navigator.geolocation.getCurrentPosition(function(position) {
        //                    var geolocation = {
        //                        lat: position.coords.latitude,
        //                        lng: position.coords.longitude
        //                    };
        //                    var circle = new google.maps.Circle({
        //                        center: geolocation,
        //                        radius: position.coords.accuracy
        //                    });
        //                    autocomplete.setBounds(circle.getBounds());
        //                });
        //            }
        //        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ3mMyZ8JW2d-05hTXT42oACWS1I86kZY&libraries=places&callback=initAutocomplete&language=en-CA"
            async defer></script>
    </body>
    </html>
@endsection