@extends('layouts.app')

@section('title')
    Panels | TagPanel
@endsection

@section('pagecss')
    <!-- Custom styling plus plugins -->

@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Countries with active tags
                    <small>in the world.</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Panels</li>
                    {{--<li class="active">Regions</li>--}}
                </ol>
            </div>
        </div>
        <div class="row">
        @if($locations)
            @foreach($locations as $location)
                <a href="{{url('/panels/'.$location->tag_country)}}">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-compass"> {{$location->tag_country}}</i></h4>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
        @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection