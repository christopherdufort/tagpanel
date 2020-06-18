@extends('layouts/app')

@section('title')
    My Feed | TagPanel
@endsection

@section('pagecss')
@endsection

@section('pagejs')
@endsection

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Feed
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">My Feed</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        @if($tags)
            @foreach($tags as $tag)
                <!-- Feed post row -->
                    <div class="row">
                        <div class="col-md-1 text-center">
                            <p><i class="fa fa-camera fa-4x"></i>
                            </p>
                            <p>{{$tag->created_at->format('M-d') }}</p>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ url('tags/'.$tag->tag_id) }}">
                                <img class="img-responsive img-hover" src="{{ URL::to('/') }}{{'/'.$tag['media_path']}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <h3>
                                <a href="{{ url('tags/'.$tag->tag_id) }}">{{$tag->title}}</a>
                            </h3>
                            <p>by <a href="#">{{$tag->username}}</a>
                            </p>
                            <p>{{$tag->description}}</p>
                            <a class="btn btn-success" href="{{ url('tags/'.$tag->tag_id) }}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <!-- /.row -->
                <hr>
            @endforeach
        @endif


        {{--<hr>--}}

        {{--<!-- Blog Post Row -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-1 text-center">--}}
                {{--<p><i class="fa fa-film fa-4x"></i>--}}
                {{--</p>--}}
                {{--<p>June 17, 2014</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<a href="blog-post.html">--}}
                    {{--<img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<h3><a href="blog-post.html">Blog Post Title</a>--}}
                {{--</h3>--}}
                {{--<p>by <a href="#">Start Bootstrap</a>--}}
                {{--</p>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>--}}
                {{--<a class="btn btn-success" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        {{--<hr>--}}

        {{--<!-- Blog Post Row -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-1 text-center">--}}
                {{--<p><i class="fa fa-file-text fa-4x"></i>--}}
                {{--</p>--}}
                {{--<p>June 17, 2014</p>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<a href="blog-post.html">--}}
                    {{--<img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<h3><a href="blog-post.html">Blog Post Title</a>--}}
                {{--</h3>--}}
                {{--<p>by <a href="#">Start Bootstrap</a>--}}
                {{--</p>--}}
                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>--}}
                {{--<a class="btn btn-success" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        {{--<hr>--}}

        {{--<!-- Pager -->--}}
        {{--<div class="row">--}}
            {{--<ul class="pager">--}}
                {{--<li class="previous"><a href="#">&larr; Older</a>--}}
                {{--</li>--}}
                {{--<li class="next"><a href="#">Newer &rarr;</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- /.row -->--}}

        <hr>

    </div>
    <!-- /.container -->

@endsection