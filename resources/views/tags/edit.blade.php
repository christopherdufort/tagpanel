@extends('layouts/app')

@section('title')
    Create Tag
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
                    <small>This Tag</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/panels') }}">Panels</a></li>
                    <li class="active">Edit Existing Tag</li>
                </ol>
            </div>
        </div>

        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form class="well form-horizontal" action="{{ url('tags/edit') }}" method="post"  id="tag_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Anything Left Blank when modifying this existing tag will remain unchanged.</legend>

                <input type="hidden" name="tag_id" value="{{$tag->tag_id}}" readonly>

                <div class="form-group">
                    <label class="col-md-4 control-label">Tag Title</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="title" placeholder="Tag Title" class="form-control"  type="text" value="{{$tag->title}}"required>
                        </div>
                    </div>
                </div>

                <!-- Select Drop down for category -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Event Category</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                            <select name="category" class="form-control selectpicker" required>
                                <option value="" disabled selected hidden>Please select an event category</option>
                                @if($categories)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($tag->category_id == $category->id)
                                                    selected
                                                @endif>
                                            {{$category->category}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">City</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div id="locationField" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input id="autocomplete" name="searchCity" placeholder="City" onFocus="geolocate()" class="form-control"  type="text" value="{{$tag->city}},{{$tag->region}},{{$tag->country}}" required>
                        </div>
                        <table id="address">
                            <tr>
                                <input type="text" class="field form-control" name="city" id="locality" value="{{$tag->city}}" readonly></td>
                            </tr>
                            <tr>
                                <input type="text" class="field form-control" name="region" id="administrative_area_level_1" value="{{$tag->region}}" readonly></td>
                            </tr>
                            <tr>
                                <input type="text" class="field form-control" name="country" id="country" value="{{$tag->country}}" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>


            <!-- Description text area -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Tag Description</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="description" placeholder="Tag Description"  required>{{$tag->description}}</textarea>
                        </div>
                    </div>
                </div>

                <!-- MAX_FILE_SIZE must precede the file input field -->
                {{--<input type="hidden" name="MAX_FILE_SIZE" value="300000" />--}}
                <div class="form-group">
                    <label class="col-md-4 control-label">Select Image (recommended: 700x450)</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <!-- Name of input element determines name in $_FILES array -->
                            <input type="file" accept="image/*" name="userFile">
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Your tag has been posted.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" onclick="return validate()">Update Tag <span class="glyphicon glyphicon-upload"></span> </button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    </div><!-- /.container -->

    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ3mMyZ8JW2d-05hTXT42oACWS1I86kZY&libraries=places&callback=initAutocomplete"
            async defer></script>

    <script>
        function validate() {
            var locality;
            locality = document.getElementById("locality").value;
            if (locality == "") {
                alert("Please enter a valid city name");
                return false;
            };
        }
    </script>

@endsection