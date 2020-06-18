@extends('layouts/app')

@section('title')
    New Dashboard
@endsection

@section('pagecss')
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

@endsection

@section('pagejs')
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- jVectorMap -->
    <script src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>

    <!-- jVectorMap -->
    <script src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script src="js/maps/gdp-data.js"></script>
    <script>
        $(document).ready(function(){
            $('#world-map-gdp').vectorMap({
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                zoomOnScroll: false,
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#E6F2F0', '#149B7E'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function(e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>
    <!-- /jVectorMap -->


@endsection

@section('content')
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row" style="background-color: #FFFFFF;">
        <div class="col-lg-12" style="float:none;">

                    @if (auth()->user()->isAdmin())
                        <h1 class="page-header">Home
                        <small>Administrator Dashboard</small>
                        </h1>
                    @else
                        <h1 class="page-header">Home
                        <small>User Dashboard</small>
                        </h1>
                    @endif

            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- page content -->
        <div class="">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-heart"></i></div>
                        <div class="count">{{$loves}}</div>
                        <h3>Love It Count</h3>
                        <p>Total # of Love It's across all tags you created.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-share"></i></div>
                        <div class="count">{{$shares}}</div>
                        <h3>Share Count</h3>
                        <p>Total # of Shares of all tags you created.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-tags "></i></div>
                        <div class="count">{{$tags}}</div>
                        <h3>Tag Count</h3>
                        <p>Total Number of Tags you created so far.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-star"></i></div>
                        <div class="count">{{$averageRating}}</div>
                        <h3>Average Rating</h3>
                        <p>Average rating of all the tags you created.</p>
                    </div>
                </div>
            </div>
        </div>

    {{--<div class="row">--}}

        {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}
            {{--<div class="x_panel">--}}
                {{--<div class="x_title">--}}
                    {{--<h2>Visitors location <small>geo-presentation</small></h2>--}}
                    {{--<ul class="nav navbar-right panel_toolbox">--}}
                        {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                                {{--<li><a href="#">Settings 1</a>--}}
                                {{--</li>--}}
                                {{--<li><a href="#">Settings 2</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<div class="dashboard-widget-content">--}}
                        {{--<div class="col-md-4 hidden-small">--}}
                            {{--<h2 class="line_30">125.7k Views from 60 countries</h2>--}}

                            {{--<table class="countries_list">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>United States</td>--}}
                                    {{--<td class="fs15 fw700 text-right">33%</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>France</td>--}}
                                    {{--<td class="fs15 fw700 text-right">27%</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Germany</td>--}}
                                    {{--<td class="fs15 fw700 text-right">16%</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Spain</td>--}}
                                    {{--<td class="fs15 fw700 text-right">11%</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Britain</td>--}}
                                    {{--<td class="fs15 fw700 text-right">10%</td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}



        </div>
@endsection