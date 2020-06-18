@extends('layouts/app')

@section('title')
    Tags Dashboard | TagPanel
@endsection

@section('pagecss')
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
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

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm"
                            },
                            {
                                extend: "csv",
                                className: "btn-sm"
                            },
                            {
                                extend: "excel",
                                className: "btn-sm"
                            },
                            {
                                extend: "pdfHtml5",
                                className: "btn-sm"
                            },
                            {
                                extend: "print",
                                className: "btn-sm"
                            },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            TableManageButtons.init();
        });
    </script>
    <!-- /Datatables -->
@endsection

@section('content')
    <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row" style="background-color: #FFFFFF;">
        <div class="col-lg-12" style="float:none;">

                    @if (auth()->user()->isAdmin())
                        <h1 class="page-header">All Tags
                        <small>Administrator Dashboard</small>
                        </h1>
                    @else
                        <h1 class="page-header">My Tags
                        <small>User Dashboard</small>
                        </h1>
                    @endif

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/') }}">Dashboard</a></li>
                    @if (auth()->user()->isAdmin())
                        <li class="active">All Tags</li>
                    @else
                        <li class="active">My Tags</li>
                    @endif
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- page content -->
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="clearfix"></div>

            <!--TABLE START-->
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tags Table
                                    @if (auth()->user()->isAdmin())
                                        <small>Administrator Version</small>
                                    @else
                                        <small>User Version</small>
                                    @endif
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <p>From here you can <code>View</code>,<code>Edit</code>and<code>Delete</code>
                                @if (auth()->user()->isAdmin())
                                    any of the tags in the database.
                                @else
                                    the tags that you created.</p>
                                @endif

                            <div class="table-responsive">

                                <table id="datatable" class="table table-striped table-bordered jambo_table bulk_action">
                                    <thead>
                                    <tr>
                                        <th>Tag #</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>City</th>
                                        <th>Description</th>
                                        <th>Like Count</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($tags)
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{$tag->tag_id}}</td>
                                                <td>{{$tag->title}}</td>
                                                <td>{{$tag->category}}</td>
                                                <td>{{$tag->tag_city}}</td>
                                                <td>{{$tag->description}}</td>
                                                <td>{{$tag->like_count}}</td>
                                                <td><a href="{{ url('/tags/'.$tag->tag_id) }}" type="button" role="button" class="btn btn-info">View</a></td>
                                                <td><a href="{{ url('/tags/edit/'.$tag->tag_id) }}" type="button" role="button" class="btn btn-warning">Edit</a></td>
                                                <td><a href="{{ url('/tags/delete/'.$tag->tag_id) }}" type="button" role="button" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--TABLE END -->
        </div>
    </div>
</div>
@endsection