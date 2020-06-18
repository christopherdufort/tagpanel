@extends('layouts.app')

@section('content')
    <div class="container">

    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Account Creation
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Account Creation</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Account Creation Complete</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <h3>Thank you for creating an account with tagpanel.com, before continuing we require that you verify your email.</h3>
                            <h5>If you are having trouble finding your email please check your spam folder.</h5>
                            <h3>Merci d'avoir créé un compte avec tagpanel.com , avant de continuer , nous vous demandons de vérifier votre emai.</h3>
                            <h5>Si vous éprouvez des difficultés à trouver votre email s'il vous plaît vérifier votre dossier spam.</h5>
                            <a class="btn btn-lg btn-default btn-block" href="{{ url('/login') }}" style="margin: auto">Click Here to Login once you have verified your email.<br/>
                                Cliquez ici pour accéder une fois que vous avez vérifié votre email .</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
