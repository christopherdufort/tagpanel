@extends('layouts/app')

@section('title')
    TagPanel | Home
@endsection

@section('pagecss')
    <!-- Custom styling plus plugins -->
    <link href="{{ asset('/build/css/mediagallery.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/panels.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/reaction.css') }}" rel="stylesheet">
@endsection

@section('pagejs')
    <script src="/js/typeahead.min.js"></script>
@endsection

@section('content')
    {{--<!-- Header Carousel -->--}}
    {{--<header id="myCarousel" class="carousel slide">--}}
    {{--<!-- Indicators -->--}}
    {{--<ol class="carousel-indicators">--}}
    {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
    {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
    {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
    {{--</ol>--}}

    {{--<!-- Wrapper for slides -->--}}
    {{--<div class="carousel-inner">--}}
    {{--<div class="item active">--}}
    {{--<div class="fill"--}}
    {{--style="background-image:url('https://static.pexels.com/photos/2752/city-sunny-people-street-large.jpg');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>Rate what you are experiencing now and share it with your community!</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<div class="fill"--}}
    {{--style="background-image:url('https://static.pexels.com/photos/2850/people-party-dancing-music-large.jpg');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>Be inspired by what others in your community love.</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="item">--}}
    {{--<div class="fill"--}}
    {{--style="background-image:url('https://static.pexels.com/photos/35550/ipad-tablet-technology-touch-large.jpg');"></div>--}}
    {{--<div class="carousel-caption">--}}
    {{--<h2>No matter where you are, find whats going on around you.</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- Controls -->--}}
    {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
    {{--<span class="icon-prev"></span>--}}
    {{--</a>--}}
    {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
    {{--<span class="icon-next"></span>--}}
    {{--</a>--}}
    {{--</header>--}}

    <!-- Page Content -->
    <div id="tagpanelBackgroundDiv">


        <div class="container">


            {{--</div>--}}
            {{--<!-- /.row --><p id="demo"></p>--}}
            {{--<form id="myForm" action="{{ url('/home') }}" method="post">--}}
            {{--{{ csrf_field() }}--}}
            {{--<input id="lat" name="lat" type="hidden" value="" readonly>--}}
            {{--<input id="long" name="long" type="hidden" value="" readonly>--}}
            {{--</form>--}}

            {{--<!-- Marketing Icons Section -->--}}
            {{--<div class="row">--}}
            {{--<div class="col-lg-12 tagpanel-center">--}}
            {{--<h1 class="page-header">--}}
            {{--Let your community be your inspiration.--}}
            {{--</h1>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">--}}
            {{--<div class="panel-heading tagpanel-center"--}}
            {{--style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">--}}
            {{--<h4><i class="glyphicon glyphicon-star"></i> Rate & tag all the things you Love <i--}}
            {{--class="glyphicon glyphicon-heart"></i></h4>--}}
            {{--</div>--}}
            {{--<div class="panel-body" style="text-align: center">--}}
            {{--<p>Found something around town that you love? Take a photo of it, rate and tag it! Create a tag--}}
            {{--in that local panel so you can share what you think is worth 5 stars with those around--}}
            {{--you.</p>--}}
            {{--<a href="/tags/create" style="border-color: #83B91E" class="btn btn-default">Create a new Tag--}}
            {{--for your Panel.</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">--}}
            {{--<div class="panel-heading tagpanel-center"--}}
            {{--style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">--}}
            {{--<h4><i class="glyphicon glyphicon-map-marker"></i> Panels local to your Community <i--}}
            {{--class="glyphicon glyphicon-home"></i></h4>--}}
            {{--</div>--}}
            {{--<div class="panel-body" style="text-align: center">--}}
            {{--<p>No matter where you are find whats happening nearby. Find the community panel associated with--}}
            {{--the city nearest you. There you will find all the things that people in your community are--}}
            {{--into.</p>--}}
            {{--<a href="/panels/{{$country}}/{{$region}}/{{$city}}" style="border-color: #83B91E"--}}
            {{--class="btn btn-default">See all tags in your community.</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
            {{--<div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">--}}
            {{--<div class="panel-heading tagpanel-center"--}}
            {{--style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">--}}
            {{--<h4><i class="fa fa-fw fa-compass"></i> Discover and Share your findings <i--}}
            {{--class="glyphicon glyphicon-share-alt"></i></h4>--}}
            {{--</div>--}}
            {{--<div class="panel-body" style="text-align: center">--}}
            {{--<p>Are you bored or need inspiration? Maybe you are visiting a new town and don't know what--}}
            {{--there is to do. Check out what other people are into by viewing that communities pannel and--}}
            {{--share what you find.</p>--}}
            {{--<a href="/panels/{{$country}}/{{$region}}" style="border-color: #83B91E"--}}
            {{--class="btn btn-default">Check out nearby Communities</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row" style="text-align: center">--}}
                {{--<form class="form-inline" method="post" action="{{ url('/panels/search')}}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="col-md-12">--}}
                        {{--<!-- 6 inputs are being submitted in this form, 3 current fields for current and 3 fields for search -->--}}
                        {{--<!-- Used to maintain the state of the current page for searching within the same location -->--}}
                        {{--<input type="hidden" name="currentCity" value="{{$city}}">--}}
                        {{--<input type="hidden" name="currentRegion" value="{{$region}}">--}}
                        {{--<input type="hidden" name="currentCountry" value="{{$country}}">--}}
                        {{--<!-- New location automatically filled in from the javascript google auto fill -->--}}
                        {{--<table id="address">--}}
                            {{--<tr>--}}
                                {{--<input type="text" class="field" name="city" id="locality"></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<input type="text" class="field" name="region" id="administrative_area_level_1"></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<input type="text" class="field" name="country" id="country"></td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                        {{--<input type="text" class="form-control" name="searchCity" placeholder="{{$city}}"--}}
                               {{--value="{{$city}}">--}}
                        {{--<div id="locationField">--}}
                            {{--<input id="autocomplete" class="form-control tagpanel-spacing" name="searchCity"--}}
                                   {{--placeholder="Enter name of any city" onFocus="geolocate()" type="text"--}}
                                   {{--onkeydown="if (event.keyCode == 13) {return false;}">--}}

                            {{--<select name="searchCategory" class="form-control selectpicker tagpanel-spacing">--}}
                                {{--<option value="" disabled selected hidden>Select a category</option>--}}
                                {{--@if($categories)--}}
                                    {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{$category->id}}">{{$category->category}}</option>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</select>--}}
                            {{--<input type="text" class="form-control" name="category" placeholder="Any Category">--}}
                            {{--<button type="submit" class="btn btn-success tagpanel-spacing"><span--}}
                                        {{--class="glyphicon glyphicon-search"></span>--}}
                                {{--Search--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
            <!--OLD SEARCH BAR-->
            <!--NEW SEARCH BAR-->
            <h1 class="page-header homepage-title title-top">
                What if?
            </h1>
            <div class="row" style="text-align: center">
                <form id="autofillSearch" class="form-inline" method="post" action="{{ url('autofill/search')}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <!-- 6 inputs are being submitted in this form, 3 current fields for current and 3 fields for search -->
                        <!-- Used to maintain the state of the current page for searching within the same location -->
                        <input type="hidden" name="currentCity" value="{{$city}}">
                        <input type="hidden" name="currentRegion" value="{{$region}}">
                        <input type="hidden" name="currentCountry" value="{{$country}}">
                        <!-- New location automatically filled in from the javascript google auto fill -->
                        <table id="address">
                            <tr>
                                <input type="text" class="field" name="city" id="locality"></td>
                            </tr>
                            <tr>
                                <input type="text" class="field" name="region" id="administrative_area_level_1"></td>
                            </tr>
                            <tr>
                                <input type="text" class="field" name="country" id="country"></td>
                            </tr>
                        </table>
                        {{--<input type="text" class="form-control" name="searchCity" placeholder="{{$city}}" value="{{$city}}">--}}
                        <div id="locationField">
                            <input id="ajaxsearch" class="form-control tagpanel-spacing" name="typeahead"
                                   placeholder="Enter the name of any city or person" onFocus="" type="text"
                                   onkeyup="" list="autocompleteList">
                            <datalist id="autocompleteList">
                                <option value="Montreal">
                                <option value="Miami">
                                <option value="Monta Rosa">
                                <option value="New York">
                                <option value="Kigali">
                                <option value="Maria">
                            </datalist>
                            {{--<input type="text" class="form-control" name="category" placeholder="Any Category">--}}
                            <button id="ajaxbutton" type="submit" class="btn btn-success tagpanel-spacing"><span
                                        class="glyphicon glyphicon-search"></span>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END OF NEW SEARCH-->
            <script>
                function fillsearch() {
                    document.getElementById("autofillSearch").submit();
                }
            </script>
            <h2 class="page-header homepage-title">
                Validate your ideas and choices with your friends & your community.
            </h2>

            {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
            {{--<h2 class="page-header">Check out popular Tags from your community Panel: <a--}}
            {{--href="/panels/{{$country}}/{{$region}}/{{$city}}">{{$city}},{{$region}},{{$country}}</a>--}}
            {{--</h2>--}}
            {{--</div>--}}
            {{--</div>--}}
            <script type="text/javascript">
                function sendIt($id) {
                        <?php
                        if (!Auth::check()) {
                            echo "window.location = 'http://www.tagpanel.com/login';";
                        }
                        ?>
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            document.getElementById($id).innerHTML = xhttp.responseText;
                        }
                    };
                    {{--xhttp.open("GET", "../tags/like/{{$tag->tag_id}}", true);--}}
                    xhttp.open("GET", "tags/like/" + $id, true);
                    xhttp.send();
                }
            </script>
            {{--<div class="row">--}}
            {{--@if($tags)--}}
            {{--@foreach($tags as $tag)--}}
            {{--<div class="col-md-4 col-sm-6 col-lg-4">--}}
            {{--<div class="thumbnail">--}}
            {{--<div>--}}
            {{--<a title="Visit Profile" class="tagpanel-profile-link"--}}
            {{--href="{{ url('/profile/'.$tag->username) }}"><p--}}
            {{--style="font-size: 15px; display:inline">--}}
            {{--<img class="fb-image-profile round-border tagpanel-thumbnail tagpanel-profile-thumbnail"--}}
            {{--src="{{ URL::to('/') }}{{'/'.$tag['profile_path']}}"--}}
            {{--alt="Profile Thumbnail Image"--}}
            {{--style="padding-right:0px; height: 32px; width: 32px;"/>--}}
            {{--{{ $tag->name}}</p>--}}
            {{--</a>--}}

            {{--<span class="tagpanel-date">{{$tag->created_at->format('M-d') }}</span>--}}
            {{--</div>--}}
            {{--<a href="{{ url('tags/'.$tag->tag_id) }}">--}}
            {{--<div class="image view view-first">--}}
            {{--<img style="width: 100%; display: block;"--}}
            {{--src="{{ URL::to('/') }}{{'/'.$tag['media_path']}}" alt="image">--}}
            {{--<div class="square bg"--}}
            {{--style="background-image: url({{ URL::to('/') }}{{'/'.$tag['media_path']}})">--}}
            {{--<div class="content">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="mask pointer">--}}
            {{--<p></p>--}}
            {{--<div class="tools tools-bottom">--}}
            {{--{{$tag->title}}--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</a>--}}
            {{--<div class="caption">--}}
            {{--<!-- Load Facebook SDK for JavaScript -->--}}
            {{--<div id="fb-root"></div>--}}
            {{--<script>(function (d, s, id) {--}}
            {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
            {{--if (d.getElementById(id)) return;--}}
            {{--js = d.createElement(s);--}}
            {{--js.id = id;--}}
            {{--js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";--}}
            {{--fjs.parentNode.insertBefore(js, fjs);--}}
            {{--}(document, 'script', 'facebook-jssdk'));</script>--}}

            {{--<!-- Your share button code -->--}}
            {{--<div class="fb-share-button" data-href="http://tagpanel.com/tags/6" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftagpanel.com%2Ftags%2F6&amp;src=sdkpreparse">Share</a></div>--}}
            {{--<div class="facebook-reaction"><!-- container div for reaction system -->--}}
            {{--<button class="tagpanel-remove-button" onclick="sendIt({{$tag->tag_id}})"--}}
            {{--title="Love It"><span--}}
            {{--class="glyphicon glyphicon-heart tagpanel-social"></span></button>--}}
            {{--<span id="{{$tag->tag_id}}" class="tagpanel-count">{{$tag->like_count}}</span>--}}
            {{--<span class="like-btn"> <!-- Share -->--}}
            {{--<span title="Share"--}}
            {{--class="like-btn-emo glyphicon glyphicon-share-alt tagpanel-social"></span>--}}
            {{--<!-- Default like button emotion-->--}}
            {{--<span class="like-btn-text">Share</span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->--}}
            {{--<ul class="reactions-box"> <!-- Reaction buttons container-->--}}
            {{--<a class="fb-xfbml-parse-ignore" target="_blank"--}}
            {{--href="https://www.facebook.com/sharer/sharer.php?u=http://www.tagpanel.com/tags/{{$tag->tag_id}}"--}}
            {{--onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li--}}
            {{--class="reaction reaction-facebook"--}}
            {{--data-reaction="Facebook"></li></a>--}}
            {{--<a class="twitter-share-button" target="_blank"--}}
            {{--href="https://twitter.com/intent/tweet?hashtags=TagPanel&url=http://www.tagpanel.com/tags/{{$tag->tag_id}}"--}}
            {{--onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li--}}
            {{--class="reaction reaction-twitter"--}}
            {{--data-reaction="Twitter"></li></a>--}}
            {{--<a href="https://plus.google.com/share?url={http://www.tagpanel.com/tags/{{$tag->tag_id}}}"--}}
            {{--onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li--}}
            {{--class="reaction reaction-googleplus"--}}
            {{--data-reaction="Google+"></li></a>--}}
            {{--<a href="https://www.pinterest.com/pin/create/button/?url=http://www.tagpanel.com/tags/{{$tag->tag_id}}&media={{ URL::to('/') }}{{'/'.$tag['media_path']}}&description={{$tag->description}}"--}}
            {{--onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li--}}
            {{--class="reaction reaction-pinterest"--}}
            {{--data-reaction="Pinterest"></li></a>--}}
            {{--<a href="https://www.linkedin.com/shareArticle?url=http://www.tagpanel.com/tags/{{$tag->tag_id}}"--}}
            {{--onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li--}}
            {{--class="reaction reaction-linkedin"--}}
            {{--data-reaction="Linkedin"></li></a>--}}
            {{--<li class="reaction reaction-email" data-reaction="Email"></li>--}}
            {{--</ul>--}}
            {{--</span><span class="tagpanel-count">{{$tag->share_count}}</span>--}}
            {{--<div style="float:right">--}}
            {{--<i class="glyphicon glyphicon-star tagpanel-social tagpanel-gold-hover">{{$tag->rating}} </i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--@endif--}}

            {{--<!-- Features Section -->--}}
            {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
            {{--<h2 class="page-header">Modern Business Features</h2>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--<p>The Modern Business template by Start Bootstrap includes:</p>--}}
            {{--<ul>--}}
            {{--<li><strong>Bootstrap v3.2.0</strong>--}}
            {{--</li>--}}
            {{--<li>jQuery v1.11.0</li>--}}
            {{--<li>Font Awesome v4.1.0</li>--}}
            {{--<li>Working PHP contact form with validation</li>--}}
            {{--<li>Unstyled page elements for easy customization</li>--}}
            {{--<li>17 HTML pages</li>--}}
            {{--</ul>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id--}}
            {{--reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis--}}
            {{--quia--}}
            {{--dolorum ducimus unde.</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--<img class="img-responsive" src="http://placehold.it/700x450" alt="">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.row -->--}}

            {{--<hr>--}}
        </div>
    </div>
    <!-- Marketing Icons Section -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 tagpanel-center">
                <h1 class="page-header">
                    Let your community be your inspiration.
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">
                    <div class="panel-heading tagpanel-center"
                         style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">
                        <h4><i class="glyphicon glyphicon-star"></i> Rate & tag all the things you Love <i
                                    class="glyphicon glyphicon-heart"></i></h4>
                    </div>
                    <div class="panel-body" style="text-align: center">
                        <p>Found something around town that you love? Take a photo of it, rate and tag it! Create a tag
                            in that local panel so you can share what you think is worth 5 stars with those around
                            you.</p>
                        <a href="/tags/create" style="border-color: #83B91E" class="btn btn-default">Create a new Tag
                            for your Panel.</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">
                    <div class="panel-heading tagpanel-center"
                         style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">
                        <h4><i class="glyphicon glyphicon-map-marker"></i> Panels local to your Community <i
                                    class="glyphicon glyphicon-home"></i></h4>
                    </div>
                    <div class="panel-body" style="text-align: center">
                        <p>No matter where you are find whats happening nearby. Find the community panel associated with
                            the city nearest you. There you will find all the things that people in your community are
                            into.</p>
                        <a href="/panels/{{$country}}/{{$region}}/{{$city}}" style="border-color: #83B91E"
                           class="btn btn-default">See all tags in your community.</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="border-radius: 27px; border-color: #83B91E ">
                    <div class="panel-heading tagpanel-center"
                         style="background: #83B91E;border-top-left-radius: 25px;border-top-right-radius: 25px; color:black; border-color:#ddd">
                        <h4><i class="fa fa-fw fa-compass"></i> Discover and Share your findings <i
                                    class="glyphicon glyphicon-share-alt"></i></h4>
                    </div>
                    <div class="panel-body" style="text-align: center">
                        <p>Are you bored or need inspiration? Maybe you are visiting a new town and don't know what
                            there is to do. Check out what other people are into by viewing that communities pannel and
                            share what you find.</p>
                        <a href="/panels/{{$country}}/{{$region}}" style="border-color: #83B91E"
                           class="btn btn-default">Check out nearby Communities</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Marketing Icons Section -->
    <script>
        var demo = document.getElementById("demo");
        var lat = document.getElementById("lat");
        var long = document.getElementById("long");


        function checkCookie() {
            //Name of the cookie we are looking for.
            var name = "LocationCookie";
            var found = false;
            //Get an array of all the cookies.
            var cookies = document.cookie.split(";");

            //Loop through each item in the array of cookies.
            for (var i = 0, allCookies = cookies.length; i < allCookies; i++) {
                //Seperate the name from the value by spliting on =
                var cookie = cookies[i].split("=");
                //Show cookie names
                //alert(cookie[0]);
                //Check if cookie name matches the name we are looking for.
                if (name === cookie[0].trim()) {
                    //Update variable value, and break out of loop no longer searching
                    found = true;
                    break;
                }
                else {

                }
            }
            if (!found) {
                //No cookie was found, we don't know their true location lets ask for it.
                //alert("get location");
                getLocation();
            }

        }
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                demo.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            demo.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;

            lat.value = position.coords.latitude;
            long.value = position.coords.longitude;
            document.getElementById("myForm").submit();
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    demo.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    demo.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    demo.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    demo.innerHTML = "An unknown error occurred."
                    break;
            }
        }

        window.onload = checkCookie;
    </script>
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

    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>
@endsection