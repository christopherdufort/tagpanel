@extends('layouts.app')

@section('content')
    <div class="container">
    {{--<script>--}}
    {{--window.fbAsyncInit = function() {--}}
    {{--FB.init({--}}
    {{--appId      : '1124929497545095',--}}
    {{--xfbml      : true,--}}
    {{--version    : 'v2.6'--}}
    {{--});--}}
    {{--};--}}

    {{--(function(d, s, id){--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) {return;}--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.src = "//connect.facebook.net/en_US/sdk.js";--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));--}}
    {{--</script>--}}

    {{--<script>--}}
    {{--// This is called with the results from from FB.getLoginStatus().--}}
    {{--function statusChangeCallback(response) {--}}
    {{--console.log('statusChangeCallback');--}}
    {{--console.log(response);--}}
    {{--// The response object is returned with a status field that lets the--}}
    {{--// app know the current login status of the person.--}}
    {{--// Full docs on the response object can be found in the documentation--}}
    {{--// for FB.getLoginStatus().--}}
    {{--if (response.status === 'connected') {--}}
    {{--// Logged into your app and Facebook.--}}
    {{--testAPI();--}}
    {{--} else if (response.status === 'not_authorized') {--}}
    {{--// The person is logged into Facebook, but not your app.--}}
    {{--document.getElementById('status').innerHTML = 'Please log ' +--}}
    {{--'into this app.';--}}
    {{--} else {--}}
    {{--// The person is not logged into Facebook, so we're not sure if--}}
    {{--// they are logged into this app or not.--}}
    {{--document.getElementById('status').innerHTML = 'Please log ' +--}}
    {{--'into Facebook.';--}}
    {{--}--}}
    {{--}--}}

    {{--// This function is called when someone finishes with the Login--}}
    {{--// Button.  See the onlogin handler attached to it in the sample--}}
    {{--// code below.--}}
    {{--function checkLoginState() {--}}
    {{--FB.getLoginStatus(function(response) {--}}
    {{--statusChangeCallback(response);--}}
    {{--});--}}
    {{--}--}}

    {{--window.fbAsyncInit = function() {--}}
    {{--FB.init({--}}
    {{--appId      : '1124929497545095',--}}
    {{--cookie     : true,  // enable cookies to allow the server to access--}}
    {{--// the session--}}
    {{--xfbml      : true,  // parse social plugins on this page--}}
    {{--version    : 'v2.5' // use graph api version 2.5--}}
    {{--});--}}

    {{--// Now that we've initialized the JavaScript SDK, we call--}}
    {{--// FB.getLoginStatus().  This function gets the state of the--}}
    {{--// person visiting this page and can return one of three states to--}}
    {{--// the callback you provide.  They can be:--}}
    {{--//--}}
    {{--// 1. Logged into your app ('connected')--}}
    {{--// 2. Logged into Facebook, but not your app ('not_authorized')--}}
    {{--// 3. Not logged into Facebook and can't tell if they are logged into--}}
    {{--//    your app or not.--}}
    {{--//--}}
    {{--// These three cases are handled in the callback function.--}}

    {{--FB.getLoginStatus(function(response) {--}}
    {{--statusChangeCallback(response);--}}
    {{--});--}}

    {{--};--}}

    {{--// Load the SDK asynchronously--}}
    {{--(function(d, s, id) {--}}
    {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
    {{--if (d.getElementById(id)) return;--}}
    {{--js = d.createElement(s); js.id = id;--}}
    {{--js.src = "//connect.facebook.net/en_US/sdk.js";--}}
    {{--fjs.parentNode.insertBefore(js, fjs);--}}
    {{--}(document, 'script', 'facebook-jssdk'));--}}

    {{--// Here we run a very simple test of the Graph API after login is--}}
    {{--// successful.  See statusChangeCallback() for when this call is made.--}}
    {{--function testAPI() {--}}
    {{--console.log('Welcome!  Fetching your information.... ');--}}
    {{--FB.api('/me', function(response) {--}}
    {{--console.log('Successful login for: ' + response.name);--}}
    {{--document.getElementById('status').innerHTML =--}}
    {{--'Thanks for logging in, ' + response.name + '!';--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}

    {{--<!----}}
    {{--Below we include the Login Button social plugin. This button uses--}}
    {{--the JavaScript SDK to present a graphical Login button that triggers--}}
    {{--the FB.login() function when clicked.--}}
    {{---->--}}

    {{--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">--}}
    {{--</fb:login-button>--}}

    {{--<div--}}
    {{--class="fb-like"--}}
    {{--data-share="true"--}}
    {{--data-width="450"--}}
    {{--data-show-faces="true">--}}
    {{--</div>--}}

    {{--<div id="status">--}}
    {{--</div>--}}

    {{--<!--  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!END OF FACEBOOK -->--}}

    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Login
                    <small>is required to access some features of this site.</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>

                                    {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your--}}
                                        {{--Password?</a>--}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">No Account?</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a class="btn btn-lg btn-default btn-block" href="{{ url('/register') }}" style="margin: auto">Click Here to Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
