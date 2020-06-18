@extends('layouts.app')

@section('content')
    <div class="container">

    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Verification
                    <small>complete</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">Verification</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Verification Complete.</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a class="btn btn-lg btn-default btn-block" href="{{ url('/login') }}" style="margin: auto">Click Here to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
