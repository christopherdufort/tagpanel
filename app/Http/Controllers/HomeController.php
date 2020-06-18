<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Category;
use App\Tag;
use Redirect;
use Auth;
use Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function home()
//    {
//        return view('home');
//    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //Temporarily redirect to construction page
        //return $this->construction();

        if (isset($_COOKIE['LocationCookie'])){
            //return " I see your cookie! ". $_COOKIE['LocationCookie'];
            $location = $_COOKIE['LocationCookie'];

            $split = explode("/",$location);
            $city = $split[0];
            $region = $split[1];
            $country = $split[2];

            return $this->home($city,$region,$country);
        }

        //end cookie

        //ELSE no cookie was found with the location so we will find an approximate location based on IP.

        //display
        //return view ('index');

        //Theo laval test:
//        $ipaddress = "173.179.125.119";

        //laval test
        //$ipaddress ="69.159.91.13";
        //montreal test
        $ipaddress ="45.74.164.27";
        //request ip from users machine
//        $ipaddress = $_SERVER['REMOTE_ADDR'];

        $jsonurl = "http://ip-api.com/json/".$ipaddress;

//        $jsonurl = "http://api.ipinfodb.com/v3/ip-city/?key=6df248aad82b431f031896eef88f314ea807cbf0828bdf810779a2cb468353e7&ip=".$ipaddress."&format=json";
//        $jsonurl = "http://api.eurekapi.com/iplocation/v1.8/locateip?key=SAKPZ68W3FYZHGANZB8Z&ip=".$ipaddress."&format=JSON";
//        $jsonurl = "http://api.eurekapi.com/iplocation/v1.8/locateip?key=SAK3D5S2M6M47Y4Z9HUZ&ip=".$ipaddress."&format=JSON";
        //$jsonurl = "http://api.db-ip.com/v2/532c0d1d68bc711163a1d956123feacd0db79821/".$ipaddress;
        $json = file_get_contents($jsonurl);
        $location = json_decode($json,true);
        //var_dump($location);
//        $city = $location['city'];
//        if (str_contains($city,'(')){
//            $rootCity = substr($city,0, strpos($city,'('));
//        }
//        else
//            $rootCity = $city;
        //USed for eurekAPI
//        $city = $location['geolocation_data']['city'];
//        $region = $location['geolocation_data']['region_name'];
//        $country = $location['geolocation_data']['country_name'];

        //used for ipinfodb
//        $city = $location['cityName'];
//        $region = $location['regionName'];
//        $country = $location['countryName'];

        //used for ip-api
        $city = $location['city'];
        $region = $location['region'];
        $country = $location['country'];

//        $rootCity= trim($city);

        //return redirect('panels/'.$rootCity)->with('place', $city,$region,$country);
        //return redirect('panels/'.$rootCity);
        //return view('Tags/index', ['city'=>$city, 'region'=>$region ,'country'=>$country]);

//        return $this->home("$city,$region,$country");
        return $this->home($country,$region,$city);

        //return redirect()->action('HomeController@home', "$city,$region,$country");

//        return redirect()->action('TagsController@index', "$city,$region,$country");

    }

    public function listUser()
    {
        $search_string = Input::get('search_string');
        $output = [];
        if ($search_string == '') {
            $get_user = [];
            $output = [
                'data' => $get_user,
                'message' => 'No Data Found',
                'count' => count($get_user),
                'status' => 200,
            ];
        } else {
            $get_user = User::where('name', 'LIKE', '%' . $search_string . '%')->orWhere('email', 'LIKE', '%' . $search_string . '%')->with('user_meta')->get()->toArray();
            $get_city = State::where('city_name', 'LIKE', '%' . $search_string . '%')->orWhere('country_name', 'LIKE', '%' . $search_string . '%')->get()->toArray();
            $output = [
                'data' => array_merge($get_user,$get_city),
                'message' => 'Data Successfully Fetched',
                'count' => count(array_merge($get_user,$get_city)),
                'status' => 200,
            ];
        }
        return response()->json($output);
    }

    /**
     * This function exists to temporarily direct all traffic to a under construction page.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function construction(){
        //Return a simple view(under construction html page)
        return view('/construction');
    }
    public function home($country,$region,$city)
    {
        //Get all categories in database to populate the dropdown.
        $categories = Category::all();
        //Create an array of all possible rating to populate the drop down.
        $ratings = array("1","2","3","4","5");

//        $split = explode(",",$location);
//        if (count($split) < 3)
//        {
//            abort(400);
//        }
//        $city = $split[0];
//        $region = $split[1];
//        $country = $split[2];

//        if (count($split) == 4)
//        {
//            $categoryId = $split[3];
//            $tags = Tag::where(['tags.tag_city' => $city, 'category_id' => $categoryId])->join('users', 'tags.user_id', '=', 'users.id')->orderBy('tags.like_count', 'desc')->take(8)->get();
//            //uncomment this when you get advanced create working
//            //$tags = Tag::where(['city' => $city,'region' => $region,'country' => $country, 'category' => $categoryId])->orderBy('created_at', 'desc')->get();
//        }
//        else{
            //uncomment this when you get advanced create working
            $tags = Tag::where(['tags.tag_city' => $city])->join('users', 'tags.user_id', '=', 'users.id')->orderBy('tags.like_count', 'desc')->take(6)->get();
            //$tags = Tag::where(['city' => $city,'region' => $region,'country' => $country])->orderBy('created_at', 'desc')->get();
//        }
        //$tags = Tag::where('city', '=', $city)->get();

//       return $tags; //JSON OUTPUT
        //return view('Tags/index')->with('Tags', $tags);
        
        return view('/home', ['tags'=>$tags, 'city'=>$city,'categories'=>$categories,'region'=>$region ,'country'=>$country]);
        //Returns JSON for API
        //return $tags;
//        return view('home');
    }

    public function geolocation(){
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
                    $location['admin_1'] = $component['short_name']; /*New system uses short names I.E QC instead of Quebec*/
                    break;
                case in_array('postal_code', $component['types']):
                    $location['postal_code'] = $component['long_name'];
                    break;
                case in_array('country', $component['types']):
                    $location['country'] = $component['long_name'];
                    break;
            }

        }
        //Put a check here if locality is blank use admin 2
        //$locationCookie = $location['country'].'/'.$location['admin_1'].'/'.$location['locality'];
        $locationCookie = $location['country'].'/'.$location['admin_1'].'/'.$location['admin_2'];
        setcookie("LocationCookie", $locationCookie, time()+7200); //two hours
        return $this->home($location['country'],$location['admin_1'],$location['admin_2']);
    }
}
