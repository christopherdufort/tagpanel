@extends('layouts/app')

@section('title')
    Edit Category | TagPanel
@endsection

@section('pagecss')
    <link href="{{ asset('/css/create.css') }}" rel="stylesheet">
@endsection

@section('pagejs')
    <script src="/js/bootstrapValidator.js"></script>
    <script src="/js/create.js"></script>
@endsection

@section('content')
    {{--<h1> Create a new Publication</h1>--}}

    {{--<hr/>--}}

    {{-- could be route/action/url --}}
    {{--{!! Form::open(['url' => 'publications' ]) !!}--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('title', 'Publication Title:') !!}--}}
        {{--{!! Form::text('title',null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<!-- Description Form Input -->--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('description', 'Description:') !!}--}}
        {{--{!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<!-- Link Form Input -->--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('link', 'Link:') !!}--}}
        {{--{!! Form::text('link', null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<!-- PriceRange Form Input -->--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('priceRange', 'PriceRange:') !!}--}}
        {{--{!! Form::text('priceRange', null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
    {{--<!-- Add Publication Form Input -->--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::submit('Add Publication',['class' => 'btn btn-primary form-control']) !!}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit
                    <small>This Category</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('/dashboard/categories') }}">Categories</a></li>
                    <li class="active">Edit Existing Category</li>
                </ol>
            </div>
        </div>

        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form class="well form-horizontal" action="{{ url('category/update') }}" method="post"  id="category_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Anything Left Blank when modifying this existing category will remain unchanged.</legend>

                <input type="hidden" name="category_id" value="{{$category->id}}" readonly>

                <div class="form-group">
                    <label class="col-md-4 control-label">Category Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                            <input name="category_name" placeholder="Category Name" class="form-control"  type="text" value="{{$category->category}}"required>
                        </div>
                    </div>
                </div>


                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Your Category has been modified.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" onclick="">Update Category <span class="glyphicon glyphicon-upload"></span> </button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->

@endsection