<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feed;
use App\Location;
use App\Tag;
use App\UserLike;
use Redirect;
use Auth;
use Request;
use Intervention\Image\Facades\Image;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class TagsController extends Controller
{
    public function index($country,$region,$city, $searchCategory = null)
    {
        //get all in order added to db
        //$tags = Tag::all();
        //latest
        //$tags = Tag::oldest('publish_start')->get();

        //Returns JSON for API
        //return $tags;
        //alternative syntax
        //return view('articles/index', compact('Tags'));

        //return view('Tags/index')->with('Tags', $tags);
        $categories = Category::all();

        //$city=Request::get('city');
        
        //if this was a search and has a category
        if(isset($searchCategory))
        {
            $tags = Tag::where(['tags.tag_city' => $city, 'tags.tag_region' => $region, 'category_id' => $searchCategory])->join('users', 'tags.user_id', '=', 'users.id')->orderBy('tags.created_at', 'desc')->get();

        }
        else{
            $tags = Tag::where(['tags.tag_city' => $city, 'tags.tag_region' => $region])->join('users', 'tags.user_id', '=', 'users.id')->orderBy('tags.created_at', 'desc')->get();
        }
        //
//            $currentCity=Request::get('currentCity');
//            $city=Request::get('searchCity');
//            $categoryId=Request::get('searchCategory');
//            if (Request::get('searchCity') && Request::get('searchCategory'))
//            {
//                $tags = Tag::where(['city' => $city, 'category' => $categoryId])->get();
//            }
//            elseif (Request::get('searchCity'))
//            {
//                $tags = Tag::where(['city' => $city])->get(); //this should use place_id?
//            }
//            elseif(Request::get('searchCategory')) //search in current city for that category
//            {
//                $tags = Tag::where(['city' => $currentCity, 'category' => $categoryId])->get();//this should use place_id?
//            }
//            $region = $split[1];
//            $country = $split[2];

//            $split = explode(",",$location);
//            if (count($split) < 3)
//            {
//                abort(400);
//            }
//            $city = $split[0];
//            $region = $split[1];
//            $country = $split[2];

//            if (count($split) == 4)
//        $categoryId = null;
//            if($categoryId)
//            {
////                $categoryId = $split[3];
//
//                //uncomment this when you get advanced create working
//                //$tags = Tag::where(['city' => $city,'region' => $region,'country' => $country, 'category' => $categoryId])->orderBy('created_at', 'desc')->get();
//            }
//            else{
//                //uncomment this when you get advanced create working
//                $tags = Tag::where(['tags.tag_city' => $city])->join('users', 'tags.user_id', '=', 'users.id')->orderBy('tags.created_at', 'desc')->get();
//                //$tags = Tag::where(['city' => $city,'region' => $region,'country' => $country])->orderBy('created_at', 'desc')->get();
//            }
            //$tags = Tag::where('city', '=', $city)->get();

//       return $tags; //JSON OUTPUT
        //return view('Tags/index')->with('Tags', $tags);
//        return view('/home', ['tags'=>$tags, 'city'=>$city,'categories'=>$categories,'region'=>$region ,'country'=>$country]);
        return view('tags/index', ['tags'=>$tags, 'city'=>$city,'categories'=>$categories,'region'=>$region ,'country'=>$country]);
        //Returns JSON for API
        //return $tags;
    }
    public function autofill(){
        $input = Request::all();
        //Model::where('column', 'LIKE', '%value%')->get();
        //return $input['typeahead'];
        $value = '%'.
        $locations = Location::where('city_name', 'LIKE' , $input['typeahead'].'%')->take(10)->get(['city_name','country_name']);
        return $locations;
    }
    public function search()
    {
        $input = Request::all();

//        return $input['currentCity'].$input['currentRegion'].$input['currentCountry'];

        //Store the current information.
        $currentCity=$input['currentCity'];
        $currentRegion=$input['currentRegion'];
        $currentCountry=$input['currentCountry'];

        //If there is a new location in the search box.
        if ($input['country']!= "") {
            //If google found a region but not a city, or found a city but not a region copy the filled box to empty box.
            if ($input['city'] == "" || $input['region'] == "") {
                //City is empty, but region is present -> copy region to city
                if ($input['city'] == "" || $input['region'] != "") {
                    $city = $input['region'];
                    $region = $input['region'];
                    $country = $input['country'];
                } //region is empty, but city is present -> copy city to region
                elseif ($input['city'] != "" || $input['region'] == "") {
                    $city = $input['city'];
                    $region = $input['city'];
                    $country = $input['country'];
                }

            }
            //Neither is empty, google found complete location.
            else{
                $city=$input['city'];
                $region=$input['region'];
                $country=$input['country'];
            }
        }
        elseif ($input['country']== "")
        {
            $city=$currentCity;
            $region=$currentRegion;
            $country=$currentCountry;
        }

//        //If there is a new location in the search box.
//        if ($input['country']!= "")
//        {
//            $city=$input['city'];
//            $region=$input['region'];
//            $country=$input['country'];
//        }
        //else if it is just a category search.

        //if there is a category
        if (isset($input['searchCategory'])){
            $searchCategory=$input['searchCategory'];
        }
        else{ //No category
            $searchCategory = null;
        }
        return redirect('panels/'.$country.'/'.$region.'/'.$city.'/'.$searchCategory)->with(['searchCategory'=>$searchCategory,'currentCity'=>$currentCity,'currentRegion'=>$currentRegion,'currentCountry'=>$currentCountry]);
        // The user is logged in...
//        'title' => Request::get('title') ,
//            'event_type' => Request::get('event_type') ,
//            'city' =>  ,
//            'description' => Request::get('description')

//        $categoryId=Request::get('category');
//        $city=Request::get('city');
//
//        $searchResults = Tag::where(['city' => $city, 'category' => $categoryId])->get();
//
//        $categories = Category::all();
//        return view('tags/index', ['tags'=>$searchResults, 'city'=>$city,' categories'=>$categories]);
    }
    public function like($id)
    {
        // The user is logged in...
        if (Auth::check()) {
            //Get currently logged in user.
            $user = Auth::user();

            //Check if there is already a record in the userlike table where this user liked that tag
            $alreadyLiked = UserLike::where(['tag_id' => $id, 'user_id' => $user->id])->get();

            //if The user has not already liked it
            if ( count($alreadyLiked) == 0){
                //Increase Like Count by 1
                DB::table('tags')->where('tag_id', $id)->increment('like_count');
                //Add a record in user likes table
                DB::table('user_likes')->insert(['tag_id' => $id, 'user_id' => $user->id]);
            }
            //else he already liked it and do nothing
            //return Redirect::back();
        }
        else{
            //return unauthorized response code
            http_response_code(401);
        }
        //Return the new like count after incremented or remained the same.
        $tag = Tag::where(['tag_id' => $id])->first();
        return  $tag->like_count;

        //User must be logged in to like something.
        //Don't return anything due to ajax.
        //return redirect('/register');

    }
    public function share($id)
    {
        // The user is logged in...
        if (Auth::check()) {
            //Get currently logged in user.
            $user = Auth::user();

            //Increase share Count by 1
            DB::table('tags')->where('tag_id', $id)->increment('share_count');
        }
        return redirect('/login');

    }

    public function delete($id)
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            //->get() used for display and to view/edit contents of object
            $tag = Tag::where(['tag_id' => $id])->first();

            if ($user->admin == 1 || $user->id == $tag->user_id)
            {
                //without ->get() returns a eloquent built object to be perform on.
                $tag = Tag::where(['tag_id' => $id]);

                $tag->delete();
            }
            else{
                abort('403');
            }
            return Redirect::back();
        }
        return redirect()->route('login');

    }

    public function edit($id)
    {
        //Must be logged in to perform this action
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            //->get() used for display and to view/edit contents of object
            $tag = Tag::where(['tag_id' => $id])->first();

            //If user is an admin or owner of the tag they may proceed.
            if ($user->admin == 1 || $user->id == $tag->user_id)
            {
                //without ->get() returns a eloquent built object to be perform on.
                $tag = Tag::where('tag_id',$id)->firstOrFail();
                $categories = Category::all();

                return view('tags/edit')->with('tag', $tag)->with('categories',$categories);
            }
            else{
                abort('403');
            }
            return Redirect::back();
        }
        //Redirect user to login page.
        return redirect()->route('login');
    }

    /**
     * This function is invoked to display all information associated with a tag.
     * Will return a specific view to display all of this information.
     * @param $id
     *          The unique id of the tag which you wish to display.
     * @return $this    Return the show view to display all the content of the found tag.
     */
    public function show($id)
    {
        //diedown? basically show debug info
        //dd()
        $tag = Tag::where('tag_id',$id)->join('categories', 'tags.category_id', '=', 'categories.id')->join('users', 'tags.user_id', '=', 'users.id')->firstOrFail();

//        if (is_null($tag))
//        {
//            abort(404);
//        }
        //$categories = Category::all();
        //return view('Tags/create')->with('categories',$categories);


        return view('tags/show')->with('tag', $tag);

        
        //return view('Tags/show', ['Tag'=>$tag, 'categories'=>$categories]);

        //Returns JSON for API
        //return Tag::find($id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('tags/create')->with('categories',$categories);
    }

    /**
     * This function is called to store all of the information retrieved from the tag creation screen into the database.
     * Should validate all user entered information before creating a tag object.
     * Valid tag objects will be inserted into the database.
     *
     * @return Redirect redirect user to the panel which contains the newly created tag.
     */
    public function store()
    {
        //Check if the user is logged in before attempting to create a tag.
        if (Auth::check()) {
            $user = Auth::user();
        }
        else{
            return redirect()->route('login');
        }

        //TODO add MORE server side validation on request
        //Serverside Validation of the locations accuracy as according to google.
        $cityNoSpace =str_replace(' ', '', Request::get('city'));
        $regionNoSpace  = str_replace(' ', '', Request::get('region'));
        $countryNoSpace  =str_replace(' ', '', Request::get('country'));

        $jsonurl ="https://maps.googleapis.com/maps/api/geocode/json?address=".$cityNoSpace.','.$regionNoSpace.','.$countryNoSpace."&key=AIzaSyBVBS0UUI4hYGyySnat1jltYysa1Qhl2w4";
        $json = file_get_contents($jsonurl);
        $location = json_decode($json,true);

        if ($location['status']=="ZERO_RESULTS")
        {
            return Redirect::back()->with('message','We could not find that location, please recreate the tag!');
        }
        //TODO End

        //Make my own object dont keep using request like this,

        //Create a new tag object with all of the values from the Request Object.
        $tag = new Tag([
            'title' => Request::get('title') ,
            'category_id' => Request::get('category') ,
            'tag_city' => Request::get('city'),
            'tag_region' => Request::get('region'),
            'tag_country' => Request::get('country'),
            'description' => Request::get('description'),
            'rating' => Request::get('rating')
        ]);

        //Obtain information about the temporary file which was uploaded
        $info = pathinfo($_FILES['userFile']['name']);
        // Retrieve the extension of the file
        $ext = $info['extension'];
        //Generate a random filename.
        $newname = rand(0 ,9999999999).'.'.$ext;
        //Target to save the file should be inside the images folder.
        $target = 'images/'.$newname;
        //Make an image(file) from temporary file.
        $image = Input::file('userFile');

        //Recreate an image file in the new target path by taking the temporary file.
        Image::make($image->getRealPath())->save($target);

        //Image can be resized using the following.
        //Image::make($image->getRealPath())->resize('700','450')->save($target);

        //The target(actual saved location) should be saved in the tag object
        $tag['media_path']= $target;

        //Unique Google Location ID
        $tag['place_id']=$location['results'][0]['place_id'];

        //The user who created the tag(currently logged in)
        $tag['user_id'] = $user->id;

        //Persist the tag to the database.
        $tag->save();

        //Check for list of people subscribed to this poster.
        $subscriberlist=DB::table('subscriptions')->where('user_id', $user->id)->get(['subscriber']);

        //Make a new feed record for each subscriber informing them of this new tag.
        foreach ($subscriberlist as $subscriber){
            $feed = new Feed;

            $feed->subscriber = $subscriber->subscriber;
            $feed->tag_id = $tag->id;

            $feed->save();
        }

        //Return to the panel which contains the tag you just created.
        return redirect('/panels/'.Request::get('country').'/'.Request::get('region').'/'.Request::get('city'));
    }
    
    public function update(){

        //persist the change if you are who you say you are
        $tagId = Request::get('tag_id');

        //Check if they are logged in
        if (Auth::check())
        {
            //Get the user object from the logged in session.
            $user = Auth::user();
            //Get the Tag from db
            $tag = Tag::where(['tag_id' => $tagId])->first();

            //Check if the tag the user is trying to edit is his/hers or is an admin.

            if (!($user->id == $tag->user_id || $user->admin == 1))
            {
                abort(403, 'Unauthorized action.');
            }
        }
        else{
            //Not logged in so redirect to login page.
            return redirect()->route('login');
        }
        //Go ahead and update the tag
        $newTitle=Request::get('title');
        //If they submitted empty/null use current title
        if (!isset($newTitle) || trim ($newTitle)===''){
            $newTitle = $tag->title;
        }
        $newCategoryId=Request::get('category');
        //Tag Belongs to user/is an admin
        $city=str_replace(' ', '', Request::get('city'));
        //If they submitted empty/null use current city
        if (!isset($city) || trim ($city)===''){
            $city = $tag->city;
        }
        //Go ahead and update the tag
        $newRegion= str_replace(' ', '', Request::get('region'));;
        //If they submitted empty/null use current region
        if (!isset($newRegion) || trim ($newRegion)===''){
            $newRegion = $tag->region;
        }
        //Go ahead and update the tag
        $newCountry=str_replace(' ', '', Request::get('country'));;
        //If they submitted empty/null use current country
        if (!isset($newCountry) || trim ($newCountry)===''){
            $newCountry = $tag->country;
        }
        //Go ahead and update the tag
        $newDescription=Request::get('description');;
        //If they submitted empty/null use current country
        if (!isset($newDescription) || trim ($newDescription)===''){
            $newDescription = $tag->description;
        }

        $info = pathinfo($_FILES['userFile']['name']); //get information about the temporary file
        //If its not null update the image
        if (!$info['filename']=='')
        {
            $ext = $info['extension']; // get the extension of the file
            $newname = rand(0 ,9999999999).'.'.$ext;
            $target = 'images/'.$newname;
            $image = Input::file('userFile');
            // create instance resize image to fixed size
            Image::make($image->getRealPath())->resize('700','450')->save($target);
            $newMediaPath = $target;
        }
        else{
            //Unchanged image keep old one.
            $newMediaPath = $tag->media_path;
        }

        
        $jsonurl ="https://maps.googleapis.com/maps/api/geocode/json?address=".$city.','.$newRegion.','.$newCountry."&key=AIzaSyBVBS0UUI4hYGyySnat1jltYysa1Qhl2w4";
        $json = file_get_contents($jsonurl);
        $location = json_decode($json,true);

        $newPlaceId = $location['results'][0]['place_id'];
        $newCity = $location['results'][0]['address_components'][0]['long_name'];

        //Update the field in the database.
        DB::table('tags')
            ->where('tag_id', $tagId)
            ->update(array(
                'title' => $newTitle,
                'category_id' => $newCategoryId,
                'tag_city' => $newCity,
                'tag_region' => $newRegion,
                'tag_country' => $newCountry,
                'place_id' => $newPlaceId,
                'media_path' => $newMediaPath,
                'description' => $newDescription
            ));
        //return $tag; //show what you added
        return redirect('/tags/'.$tagId);
    }
}
