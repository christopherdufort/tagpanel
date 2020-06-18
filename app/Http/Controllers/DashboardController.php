<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Location;
use App\Tag;
use App\Http\Requests;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        //if admin return all
        //$publications = Publication::all();
        //if user return those you own
        if (Auth::check()) {
            // The user is logged in...get user details
            $user = Auth::user();

        }
        $loves = DB::table('tags')->where('user_id', $user->id)->sum('like_count');
        $shares = DB::table('tags')->where('user_id', $user->id)->sum('share_count');
        $tags = DB::table('tags')->where('user_id', $user->id)->count();
        $averageRating = DB::table('tags')->where('user_id', $user->id)->avg('rating');
        
        return view('dashboard/index')->with('loves',$loves)->with('shares',$shares)->with('tags',$tags)->with('averageRating',$averageRating);
        //return view('dashboard/index');
        //Returns JSON for API
        //return $publications;
    }
    public function tags()
    {
        //Check if user logged in
        if (Auth::check()) {
            // The user is logged in...get user details
            $user = Auth::user();
            if ($user->admin == 1) //If admin get all tags
                $tags = Tag::where('tag_id', ">", 0)->join('categories', 'tags.category_id', '=', 'categories.id')->get();
            else //If user get the tags that belong to them.
                $tags = Tag::where('user_id', $user->id)->join('categories', 'tags.category_id', '=', 'categories.id')->get();
        }

//        return $tags;
        return view('dashboard/tags')->with('tags', $tags);
        //return view('dashboard/index');
    }
    public function users()
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if ($user->admin !== 1) {
                //not admin get out
                return view('dashboard/index');
            }
        }
        //if admin return all
        $users = User::all();
        //if user return those you own
        return view('dashboard/users')->with('users', $users);
        //return view('dashboard/index');
        //Returns JSON for API
        //return $publications;
    }
    public function category()
    {
        //if admin return all
        $categories = Category::all();
        //if user return those you own
        return view('dashboard/categories')->with('categories', $categories);
        //return view('dashboard/index');
        //Returns JSON for API
        //return $publications;
    }
    public function locations(){
        //if admin return all
        $locations = Location::all();

        //if user return those you own
        return view('dashboard/locations')->with('locations', $locations);
        //return view('dashboard/index');
        //Returns JSON for API
        //return $publications;
    }

    public function info(){
        return view('dashboard/info');
    }
    public function test(){
        //Test for st bruno
//        $lat='45.529326';
//        $long= '-73.369838';

        $lat= $_POST['lat'];
        $long = $_POST['long'];

        $jsonurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=AIzaSyAQ3mMyZ8JW2d-05hTXT42oACWS1I86kZY";
        $json = file_get_contents($jsonurl);
        $result =json_decode($json,true);

        $location = array();

        foreach ($result['results'][0]['address_components'] as $component) {

            switch ($component['types']) {
                case in_array('street_number', $component['types']):
                    $location['street_number'] = $component['long_name'];
                    break;
                case in_array('route', $component['types']):
                    $location['street'] = $component['long_name'];
                    break;
                case in_array('sublocality', $component['types']):
                    $location['sublocality'] = $component['long_name'];
                    break;
                case in_array('locality', $component['types']):
                    $location['locality'] = $component['long_name'];
                    break;
                case in_array('administrative_area_level_2', $component['types']):
                    $location['admin_2'] = $component['long_name'];
                    break;
                case in_array('administrative_area_level_1', $component['types']):
                    $location['admin_1'] = $component['long_name'];
                    break;
                case in_array('postal_code', $component['types']):
                    $location['postal_code'] = $component['long_name'];
                    break;
                case in_array('country', $component['types']):
                    $location['country'] = $component['long_name'];
                    break;
            }

        }

        return "You are exactly located in ".$location['locality'].",".$location['admin_1'].",".$location['country']." Is this correct?";
    }
}
