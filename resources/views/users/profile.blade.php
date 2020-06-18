@extends('layouts/app')

@section('title')
    Profile | TagPanel
@endsection

@section('pagecss')
    <link href="{{ asset('/css/profile.css') }}" rel="stylesheet">

    <link href="{{ asset('/build/css/mediagallery.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/panels.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/reaction.css') }}" rel="stylesheet">

@endsection

@section('pagejs')

@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<h1 class="page-header">Profile--}}
    {{--<small>Subheading</small>--}}
    {{--</h1>--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="{{ url('/home') }}">Home</a></li>--}}
    {{--<li class="active">Profile</li>--}}
    {{--</ol>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- /.row -->
        <div class="col-lg-12 col-sm-12">
            <div class="container col-lg-12 col-sm-12 profile-container">
                <div class="fb-profile" style="margin-left:-15px; margin-right:-15px; margin-top:-20px;">
                    <img align="left" class="fb-image-lg round-top" src="{{ URL::to('/') }}{{'/'.$user['banner_path']}}"
                         alt="Profile Banner Image"/>
                    <img align="left" class="fb-image-profile thumbnail round-border tagpanel-thumbnail"
                         src="{{ URL::to('/') }}{{'/'.$user['profile_path']}}" alt="Profile Thumbnail Image"
                         style="padding-right:0px;"/>
                    <div class="fb-profile-text">
                        <h1>{{ $user->name }}</h1>
                        <p class="space-left"><a
                                    href="{{ URL::to('/') }}/panels/{{$user->country}}/{{$user->region}}/{{$user->city}}"><i
                                        class="glyphicon glyphicon-map-marker"></i> {{$user->city}}, {{$user->region}}
                                , {{$user->country}}</a></p>
                        <p class="space-left"><i class="glyphicon glyphicon-calendar"></i>
                            Joined: {{ substr($user->created_at,0,10)}}</p>
                        <p>{{ $user->biography }}</p>
                        <!-- yourself dont show button -->
                        @if($subscribed == 0)
                        <!--subscribed show unsubscribe button -->
                        @elseif($subscribed == 1)
                            <a class="btn btn-md btn-success tagpanel-follow" href="{{ URL::to('/profile/unfollow') }}{{'/'.$user['id']}}"><i class="fa fa-user"></i> - Unfollow </a>
                         <!--not subscribed show subscribe button -->
                        @elseif($subscribed == 2)
                            <a class="btn btn-md btn-success tagpanel-follow" href="{{ URL::to('/profile/follow') }}{{'/'.$user['id']}}"><i class="fa fa-user"></i> + Follow </a>
                        @endif
                    </div>
                </div>
            </div> <!-- ./ profile container -->

            <!-- Tabs -->
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                {{--<div class="btn-group" role="group">--}}
                {{--<button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>--}}
                {{--<div class="hidden-xs">Info</div>--}}
                {{--</button>--}}
                {{--</div>--}}
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span
                                class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        <div class="hidden-xs">What I Love</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span
                                class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                        <div class="hidden-xs">Tags I added</div>
                    </button>
                </div>
            </div>
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
                    xhttp.open("GET", "../tags/like/"+$id, true);
                    xhttp.send();
                }
            </script>
            <!-- Text pages -->
            <div class="well">
                <div class="tab-content">
                    {{--<div class="tab-pane fade in active round-bottom" id="tab1">--}}
                    {{--<h3>This is tab 1</h3>--}}
                    {{--<p>{{ $user->name }}</p>--}}
                    {{--<p>{{ $user->email }}</p>--}}
                    {{--</div>--}}
                    <div class="tab-pane fade in round-bottom" id="tab2">
                        <div class="row">
                            @if($likes)
                                @foreach($likes as $tag)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            <div>
                                                <a title="Visit Profile" style="text-decoration: none;" href="{{ url('/profile/'.$tag->username) }}"><p
                                                            style="font-size: 15px; display:inline">
                                                        <img class="fb-image-profile round-border tagpanel-thumbnail tagpanel-profile-thumbnail tagpanel-profile-fix"
                                                             src="{{ URL::to('/') }}{{'/'.$tag['profile_path']}}"
                                                             alt="Profile Thumbnail Image"
                                                             style="padding-right:0px; height: 32px; width: 32px;"/>
                                                        {{$tag->name}}</p>
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
                                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));</script>

                                                <!-- Your share button code -->
                                                {{--<div class="fb-share-button" data-href="http://tagpanel.com/tags/6" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftagpanel.com%2Ftags%2F6&amp;src=sdkpreparse">Share</a></div>--}}
                                                <div class="facebook-reaction">
                                                    <!-- container div for reaction system -->
                                                    <button class="tagpanel-remove-button" onclick="sendIt({{$tag->tag_id}})" title="Love It"><span class="glyphicon glyphicon-heart tagpanel-social"></span></button><span id="{{$tag->tag_id}}"class="tagpanel-count">{{$tag->like_count}}</span>
                                    <span class="like-btn"> <!-- Default like button -->
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
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade in active round-bottom" id="tab3">
                    {{--<h3>Things I made</h3>--}}
                    <!-- /.row -->
                        <div class="row">
                            @if($tags)
                                @foreach($tags as $tag)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            <div>
                                                <a title="Visit Profile" style="text-decoration: none;" href="{{ url('/profile/'.$tag->username) }}"><p
                                                            style="font-size: 15px; display:inline">
                                                        <img class="fb-image-profile round-border tagpanel-thumbnail tagpanel-profile-thumbnail tagpanel-profile-fix"
                                                             src="{{ URL::to('/') }}{{'/'.$tag['profile_path']}}"
                                                             alt="Profile Thumbnail Image"
                                                             style="padding-right:0px; height: 32px; width: 32px;"/>
                                                        {{$tag->name}}</p>
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
                                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));</script>

                                                <!-- Your share button code -->
                                                {{--<div class="fb-share-button" data-href="http://tagpanel.com/tags/6" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Ftagpanel.com%2Ftags%2F6&amp;src=sdkpreparse">Share</a></div>--}}
                                                <div class="facebook-reaction">
                                                    <!-- container div for reaction system -->
                                                    <button class="tagpanel-remove-button" onclick="sendIt({{$tag->tag_id}})" title="Love It"><span class="glyphicon glyphicon-heart tagpanel-social"></span></button><span id="{{$tag->tag_id}}"class="tagpanel-count">{{$tag->like_count}}</span>
                                    <span class="like-btn"> <!-- Default like button -->
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection