@extends('layouts/app')

@section('title')
    Edit Profile
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
                <h1 class="page-header">Edit
                    <small>your profile</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a>
                    <li><a href="{{ url('#') }}">Profiles</a>
                    </li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>

        <!-- The data encoding type, enctype, MUST be specified as below -->
        <form class="well form-horizontal" action="{{ url('profile') }}" method="post"  id="tag_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Update your profile!</legend>

                <input type="hidden" name="id" value="{{$user->id}}" readonly>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">User Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="userName" placeholder="{{$user->name}}" class="form-control"  type="text" maxlength="27" value="{{$user->name}}" required>
                        </div>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Home Community(City)</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div id="locationField" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input id="autocomplete" name="searchCity" value="{{$user->city}}, {{$user->region}}, {{$user->country}}"  onFocus="geolocate()" class="form-control"  type="text" required>
                        </div>
                        <table id="address">
                            <tr>
                                <input type="text" class="field form-control" name="city" id="locality" value="{{$user->city}}" readonly></td>
                            </tr>
                            <tr>
                                <input type="text" class="field form-control" name="region" id="administrative_area_level_1" value="{{$user->region}}" readonly></td>
                            </tr>
                            <tr>
                                <input type="text" class="field form-control" name="country" id="country" value="{{$user->country}}" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>


            <!-- Description text area -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Personal Bio</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" name="biography" placeholder="Tag Description" maxlength="250" required> {{$user->biography}}</textarea>
                        </div>
                    </div>
                </div>

                <!-- MAX_FILE_SIZE must precede the file input field -->
                {{--<input type="hidden" name="MAX_FILE_SIZE" value="300000" />--}}
                <div class="form-group">
                    <label class="col-md-4 control-label">Select Profile Image (recommended: 180x180)</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <!-- Name of input element determines name in $_FILES array -->
                            <input type="file" accept="image/*" name="profileImage" >
                        </div>
                    </div>
                </div>
                <!-- MAX_FILE_SIZE must precede the file input field -->
                {{--<input type="hidden" name="MAX_FILE_SIZE" value="300000" />--}}
                <div class="form-group">
                    <label class="col-md-4 control-label">Select Profile Banner Image (recommended: 850x280)</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <!-- Name of input element determines name in $_FILES array -->
                            <input type="file" accept="image/*" name="bannerImage" >
                        </div>
                    </div>
                </div>

                <!-- Success message -->
                <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Your profile has been successfully updated.</div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success" onclick="return validate()">Update Profile <span class="glyphicon glyphicon-send"></span> </button>
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