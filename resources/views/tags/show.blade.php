
@extends('layouts/app')

@section('title')
    $tag->title | TagPanel
@endsection

@section('pagecss')
    <link href="{{ asset('/css/reaction.css') }}" rel="stylesheet">
@endsection
@section('pagejs')

@endsection

@section('pagemeta')
    <!--FACEBOOK-->
    <meta property="og:title" content="{{$tag->title}}" >
    <meta property="og:site_name" content="TagPanel">
    <meta property="og:url" content="http://www.tagpanel.com/tags/{{$tag->tag_id}}" >
    <meta property="og:description" content="{{$tag->description}}" >
    <meta property="og:image" content="http://www.tagpanel.com/{{$tag->media_path}}" >
    <meta property="og:image:secure_url" content="https://www.tagpanel.com/{{$tag->media_path}}" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="442" />
    <meta property="og:type" content="website" >
    <meta property="og:locale" content="en_US" >
    <!--END FACEBOOK-->
    <!--TWITTER-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="http://www.tagpanel.com/tags/{{$tag->tag_id}}">
    <meta name="twitter:title" content="{{$tag->title}}">
    <meta name="twitter:description" content="{{$tag->description}}">
    <meta name="twitter:image:src" content="http://www.tagpanel.com/{{$tag->media_path}}">
    <!--END TWITTER-->
@endsection

@section('content')
    {{--<h1> {{ $tag->title }}</h1>--}}

    {{--<article>--}}
        {{--<div class="body">--}}
            {{--{{ $tag->description }}--}}
        {{--</div>--}}
    {{--</article>--}}
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$tag->title}}
                    {{--<small>Subheading</small>--}}
                </h1>
                <ol class="breadcrumb">
                    <li> <a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/panels') }}">Panels</a></li>
                    <li><a href="{{ url('/panels/'.$tag->tag_country) }}">{{$tag->tag_country}}</a></li>
                    <li><a href="{{ url('/panels/'.$tag->tag_country.'/'.$tag->tag_region) }}">{{$tag->tag_region}}</a></li>
                    <li><a href="{{ url('/panels/'.$tag->tag_country.'/'.$tag->tag_region.'/'.$tag->tag_city)}}">{{$tag->tag_city}}</a></li>
                    <li class="active">Tag #{{$tag->tag_id}}</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

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
                xhttp.open("GET", "tags/like/"+$id, true);
                xhttp.send();
            }
        </script>

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    {{--<ol class="carousel-indicators">--}}
                        {{--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>--}}
                        {{--<li data-target="#carousel-example-generic" data-slide-to="1"></li>--}}
                        {{--<li data-target="#carousel-example-generic" data-slide-to="2"></li>--}}
                    {{--</ol>--}}

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img style="height: auto; width:auto; max-height: 500px; max-width: 750px;" class="img-responsive" src="{{ URL::to('/') }}{{'/'.$tag['media_path']}}" alt="">

                        </div>
                        {{--<div class="item">--}}
                            {{--<img class="img-responsive" src="http://placehold.it/750x500" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<img class="img-responsive" src="http://placehold.it/750x500" alt="">--}}
                        {{--</div>--}}
                    </div>

                    <!-- Controls -->
                    {{--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">--}}
                        {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                    {{--</a>--}}
                    {{--<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">--}}
                        {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                    {{--</a>--}}
                </div>
            </div>

            <div class="col-md-4">
                <a title="Visit Profile" class="tagpanel-profile-link" href="{{ url('/profile/'.$tag->username) }}"><p style="font-size: 15px; display:inline">
                        <img class="fb-image-profile round-border tagpanel-thumbnail tagpanel-profile-thumbnail" src="{{ URL::to('/') }}{{'/'.$tag['profile_path']}}" alt="Profile Thumbnail Image" style="padding-right:0px; height: 32px; width: 32px;"/>
                        {{$tag->name}}</p>
                </a>

                <h3>Description</h3>
                <p>{{$tag->description}}</p>
                <h3>Details</h3>
                <ul>
                    <li>Category: {{$tag->category}}</li>
                    <li>City: {{$tag->tag_city}}</li>
                    <li>Love it #: {{$tag->like_count}}</li>
                    <li>Share #: {{$tag->share_count}} </li>
                    <li>Rating: {{$tag->rating}}</li>
                </ul>
                {{--<a href="{{ url('/tags/like/'.$tag->tag_id) }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-heart"></span> Like: {{$tag->like_count}}</a>--}}
            </div>

            <div class="col-md-4">
                <br/>

            </div>
            <div class="caption">
                <!-- Load Facebook SDK for JavaScript -->
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                <!-- Your share button code -->
                {{--<div class="fb-share-button" data-href="http://tagpanel.com/tags/6" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftagpanel.com%2Ftags%2F6&amp;src=sdkpreparse">Share</a></div>--}}
                <div class="facebook-reaction"><!-- container div for reaction system -->
                    <button class="tagpanel-remove-button" onclick="sendIt({{$tag->tag_id}})" title="Love It"><span class="glyphicon glyphicon-heart tagpanel-social"></span></button><span id="{{$tag->tag_id}}"class="tagpanel-count">{{$tag->like_count}}</span>
                                <span class="like-btn"> <!-- Default like button -->
                                    <span title="Share" class="like-btn-emo glyphicon glyphicon-share-alt tagpanel-social"></span> <!-- Default like button emotion-->
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
                                </span>
                </div>
            </div>
        </div>
        <!-- /.row -->

        {{--<!-- Related Projects Row -->--}}
        {{--<div class="row">--}}

            {{--<div class="col-lg-12">--}}
                {{--<h3 class="page-header">Related Projects</h3>--}}
            {{--</div>--}}

            {{--<div class="col-sm-3 col-xs-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="col-sm-3 col-xs-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="col-sm-3 col-xs-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="col-sm-3 col-xs-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}
        <!-- /.row -->

        <hr>


    </div>
    <!-- /.container -->

@endsection