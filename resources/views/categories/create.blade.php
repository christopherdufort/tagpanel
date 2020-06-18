@extends('layouts.app')

@section('title')
    Create Tag | TagPanel
@endsection

@section('pagecss')
    <link href="{{ asset('/css/create.css') }}" rel="stylesheet">
@endsection

@section('pagejs')
    <script src="/js/bootstrapValidator.js"></script>
    <script src="/js/create.js"></script>
@endsection

@section('content')


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create
                    <small>a new category</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('/dashboard/categories') }}">Categories</a></li>
                    <li class="active">Create New</li>
                </ol>
            </div>
        </div>

        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form class="well form-horizontal" action="{{ url('category/store') }}" method="post"  id="tag_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Add a new category to the database</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Category Title</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="name" placeholder="Category Name" class="form-control"  type="text" required>
                        </div>
                    </div>
                </div>


                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Your categoy has been added.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" onclick="">Submit Category <span class="glyphicon glyphicon-upload"></span> </button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->


@endsection