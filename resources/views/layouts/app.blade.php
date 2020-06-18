<?php
/**
 * Created by PhpStorm.
 * User: Christopher
 * Date: 6/01/16
 * Time: 6:56 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Search Engine Webmaster tracking-->
        <meta name="msvalidate.01" content="703F94769030E3E18304CBF2B2217673"/>
        <meta name="google-site-verification" content="2i2M6kh8t1cs40tWRtP9ShQYGsXgGwN2q0u4f10PWLs" />
    {{--<meta name="dick" content="TagPanel.com - Whats happening in your community?">--}}
    {{--<meta name="key" content="Events, Social Media, Planning, Local, Classifieds">--}}
    {{--<meta name="aut" content="Christopher Dufort">--}}

    <!-- Page specific title -->
        <title>
            @yield('title')
        </title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/bootstrap-social.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('/css/modern-business.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/footer-distributed-with-address-and-phones.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/tagpanel.css') }}" rel="stylesheet">

        <!-- Custom Awesome Fonts -->
        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Page specific css -->
    @yield('pagecss')

    <!-- jQuery -->
        <script src="/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Page specific Javascript -->
    @yield('pagejs')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <!--[endif]-->

        @yield('pagemeta')
    </head>
    <body>
        <!-- Navigation shared by all pages -->
        <nav id="tagpanl-nav" class="navbar navbar-inverse navbar-fixed-top tagpanel-drop-shadow" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="company-main-logo" href="{{ url('/') }}">TagPanel<img style="float: left"
                                                                                                      src="/images/TagPanelLogo.png"
                                                                                                      height="42"
                                                                                                      width="42"/><span
                                id="company-second-logo"></span></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="tagpanel-add">
                                <a href="{{ url('/tags/create') }}">
                                    <div class="enjoy-css"><i class="glyphicon glyphicon-list-alt"></i><span class="hidden-sm"> Create A Tag</span>
                                    </div>
                                    <link async href="http://fonts.googleapis.com/css?family=Averia%20Sans%20Libre"
                                          data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
                                </a>

                            </div>
                            <div class="tagpanel-plus">
                                <a href="{{ url('/tags/create') }}">
                                    <div class="enjoy-css"><i class="glyphicon glyphicon-plus"></i></div>
                                    <link async href="http://fonts.googleapis.com/css?family=Averia%20Sans%20Libre"
                                          data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
                                </a>
                            </div>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ url('/tags/create') }}"><i class="glyphicon glyphicon-list-alt"></i><span class="hidden-sm"> Create A Tag</span></a>--}}
                        {{--</li>--}}
                        @if (!Auth::guest())
                            @if (auth()->user()->isAdmin())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                class="glyphicon glyphicon-th-list"></i><span class="hidden-sm"> Dashboard <b
                                                    class="caret"></b></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/dashboard">Admin Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/tags">Tag Management</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/categories">Category Management</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/users">User Management</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/locations">Location Management</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                {{--<li>--}}
                                {{--<a href="{{ url('/dashboard') }}"><i class="glyphicon glyphicon-th-list"></i><span class="hidden-sm"> Dashboard</span></a>--}}
                                {{--</li>--}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                                class="glyphicon glyphicon-th-list"></i><span class="hidden-sm"> Dashboard <b
                                                    class="caret"></b></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="/dashboard">My Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="/dashboard/tags">My Tags</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endif

                        @if (Auth::guest())
                            <li><a href="{{ url('/register') }}"><i class="fa fa-btn fa-user"></i> Sign up</a></li>
                            <li><a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i> Log in</a></li>
                        @else
                            {{--<li><a href="/profile/{{Auth::user()->id}}"><i class="fa fa-btn fa-user"></i><span class="hidden-sm"> {{ Auth::user()->name }}</span></a></li>--}}
                            <li class="dropdown">
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>--}}
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa fa-btn fa-user"></i><span class="hidden-sm"> {{ Auth::user()->name }} <b
                                                class="caret"></b></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/profile/{{Auth::user()->username}}">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="/profile/edit/{{Auth::user()->id}}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="/profile/feed/{{Auth::user()->id}}">My Feed</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i><span class="hidden-sm"> Log out</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        @yield('content')

        {{--<!-- Call to Action Section -->--}}
        {{--<div class="well" style="margin-left:5%;margin-right:5%;">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-8">--}}
                    {{--<p><b>Attention</b>: This website is currently in active development. <a--}}
                                {{--href="https://www.surveymonkey.com/r/M5NVMX9" target="_blank">Please take a moment to leave us--}}
                            {{--feedback here.</a></p>--}}
                    {{--<p><b>Attention</b>: Ce site est actuellement en développement actif. <a--}}
                                {{--href="https://fr.surveymonkey.com/r/LS9HNGJ" target="_blank">S'il vous plaît prendre un moment--}}
                            {{--pour nous laisser des commentaires ici .</a></p>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<a class="btn btn-lg btn-default btn-block" href="{{ url('/contact') }}">Report issues here!<br/>--}}
                        {{--support@tagpanel.com</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <footer id="footer" class="copyright footer-distributed">

            <div class="footer-left">
                <p>
                    {{--<a href="{{ url('/blog') }}">Blog</a> --}}
                    <a href="{{ url('/services') }}">Help</a> · <a
                            href="{{ url('/about') }}">About</a> · <a href="{{ url('/faq') }}">Faq</a> · <a
                            href="{{ url('/contact') }}">Contact</a>
                </p>
            </div>
            <div class="footer-center">
                <p>
                    2016 © tagpanel.com All Rights Reserved. <a href="{{ url('/privacy') }}">Privacy Policy</a> | <a
                            href="{{ url('/terms') }}">Terms of Service</a>
                </p>
            </div>
            <div class="footer-right">
                <a href="https://twitter.com/tagpanel" target="_blank" class="btn btn-social-icon btn-twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a href="https://www.facebook.com/tagpanel/" target="_blank" class="btn btn-social-icon btn-facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a href="https://plus.google.com/109954304884234846276" target="_blank" class="btn btn-social-icon btn-google">
                    <span class="fa fa-google"></span>
                </a>
                <a href="https://www.linkedin.com/company/tagpanel" target="_blank" class="btn btn-social-icon btn-linkedin">
                    <span class="fa fa-linkedin"></span>
                </a>
            </div>
        </footer>
    </body>
</html>