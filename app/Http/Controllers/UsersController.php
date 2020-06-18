<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\User;
use App\UserLike;
use Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use DB;
use App\Tag;

class UsersController extends Controller
{
    /**
     * This function is responsible for returning all of the information associated with a specific profile(user).
     * This information includes all public info about a user, as well as which tags they like and which they tags created.
     * A profile is uniquely requested by the username associated with each user. Usernames are unique within the database.
     * @param $username
     *              the unique username associated with the profile you are trying to view
     * @return the profile display view with user, tag and like information.
     */
    public function show($username)
    {
        //Check if the user exists within our database, if so return that object.
        $user = User::where('username', $username)->first();

        //If this user does not exist this should return resource not found error.
        if (is_null($user))
        {
           abort(404);
        }
        //Get the id of the user for simple joins.
        $id = $user->id;

        //Retrieve all of the tags that were created by this user.
        $tags = Tag::where('username', $username)->join('users', 'tags.user_id', '=', 'users.id')->get();

        //Retrieve all of the
        $likes = Tag::where('user_likes.user_id',$id)->join('users', 'tags.user_id', '=', 'users.id')->join('user_likes', 'user_likes.tag_id', '=', 'tags.tag_id')->get();

        //Get the id of the curently logged in user.
        $visitingId = Auth::user()->id;
        //Check the subscription table for the current status (if you are subscribed.)
        $subscription = Subscription::where('user_id',$user->id)->where('subscriber',$visitingId)->first();

        //SUBSCRIPTION KEY:
        // 0=yourself -> offer nothing
        // 1=already subscribed -> offer option to unsubscribe
        // 2=not subscribed -> offer option to subscribe
        if($user->id == $visitingId)
        {
            //Your looking at your own profile.
            $subscribed=0; 
        }
        elseif (isset($subscription)){
            //You are already subscribed.
            $subscribed=1;
//            return "is this guy ".$visitingId." subscribed to this guy:? ".$user->id;
        }
        else{
            //Not subscribed.
            $subscribed=2;
//            return "false".$subscription;
        }
        
        //Returns the user information, the tags that user has posted, the tags that user has liked, and if the logged in user is subscribed to them or not.
        return view('users/profile')->with('user', $user)->with('tags',$tags)->with('likes',$likes)->with('subscribed',$subscribed);
    }

    /**
     * This function is called by administrators through the admin dashboard in order to delete a user.
     * Only admin accounts are able to delete other users.
     *
     * @param $id
     *          The unique id of the user that you wish to delete from the database.
     * @return mixed    Redirects back to where you came from or login page if not authorized.
     */
    public function delete($id)
    {
        //Check if the user is logged in..
        if (Auth::check()) {
            // obtain the user object for currently logged in user.
            $user = Auth::user();
            if ($user->admin === 1)
            {
                $user = User::find($id);

                $user->delete();
            }
            return Redirect::back();
        }
        return redirect()->route('login');
    }

    /**
     * This function is called to return the user details of a particular user id in order to be edited.
     * Only the admin and the user himself can edit a profile.
     * @param $id
     *          The unique id of the user profile that you wish to edit.
     * @return $this    Returns the user profile edit view with the existing user data taken from the database
     */
    public function edit($id)
    {
        //Check if they are logged in.
        if(Auth::check())
        {
            //Get the user object from the logged in session.
            $currentUser = Auth::user();
            //Check if the profile the user is trying to edit is his/hers or that they are an admin.
            if ($currentUser->id == $id || $currentUser->admin == 1)
            {
                $user = User::find($id);
                return view('users/edit')->with('user', $user);
            }
            else
            {
                abort(403, 'Unauthorized to Edit this.');
            }

        }
        return redirect()->route('login');
    }

    /**
     * This function is called to return all of the tags/news feed updates associated with a specific user.
     * This feed often contains the contents of recently posted materials by people that one has subscribed to.
     *
     * @param $id
     *              The id of the specific user for whom you are requesting their feed.
     * @return $this    Returning a feed view containing all the content for this specific user.
     */
    public function feed($id)
    {
        //Check if they are logged in.
        if(Auth::check())
        {
            //Get the user object from the logged in session.
            $currentUser = Auth::user();
            //Check if the profile the user is trying to edit is his/hers or that they are an admin.
            if ($currentUser->id == $id || $currentUser->admin == 1)
            {
                //Retrieve a list of tags for which this user is subscribed to.
                $feedList=DB::table('feeds')->where('subscriber', $currentUser->id)->get(['tag_id']);

                //Build an array of all the tags.
                $tagIds = array();
                foreach ($feedList as $feed){
                    array_push($tagIds, $feed->tag_id);
                }

                //Retrieve all the tags who's id was found in the feed list.
                $tags = Tag::whereIn('tag_id',$tagIds)->join('users', 'tags.user_id', '=', 'users.id')->orderBy("tags.created_at","DESC")->get();

                return view('users/feed')->with('tags', $tags);
            }
            else
            {
                abort(403, 'Unauthorized to View this.');
            }

        }
        return redirect()->route('login');
    }

    /**
     * This function is called in order to update an existing profile within the database.
     * The request object will contain all of the form data that should be used to modify the existing user.
     *
     * @return Redirect     Return to the user's profile page that was just edited to see the changes made.
     */
    public function update()
    {
        //persist the change if you are who you say you are
        $id = Request::get('id');

        //Check if they are logged in.
        if(Auth::check())
        {
            //Get the user object from the logged in session.
            $user = Auth::user();
            //Check if the profile the user is trying to edit is his/hers or if they are an admin.
            if (!($user->id == $id || $user->admin == 1))
            {
                abort(403, 'Unauthorized To Update This.');
            }
        }
        else{
            return redirect()->route('login');
        }
        $newName = Request::get('userName');
        //If they submitted empty/null use current name
        if (!isset($newName) || trim ($newName)===''){
            $newName = $user->name;
        }
        $newCity =str_replace(' ', '', Request::get('city'));
        //If they submitted empty/null use current city
        if (!isset($newCity) || trim ($newCity)===''){
            $newCity = $user->city;
        }
        $newRegion = str_replace(' ', '', Request::get('region'));
        //If they submitted empty/null use current region
        if (!isset($newRegion) || trim ($newRegion)===''){
            $newRegion = $user->region;
        }
        $newCountry =str_replace(' ', '', Request::get('country'));
        //If they submitted empty/null use current country
        if (!isset($newCountry) || trim ($newCountry)===''){
            $newCountry = $user->country;
        }
        $newBiography = Request::get('biography');
        //If they submitted empty/null use current biography
        if (!isset($newBiography) || trim ($newBiography)===''){
            $newBiography = $user->biography;
        }

        $info = pathinfo($_FILES['profileImage']['name']); //get information about the temporary file
        if (!$info['filename']=='')
        {
            $ext = $info['extension']; // get the extension of the file
            $newname = rand(0 ,9999999999).'.'.$ext;
            $target = 'images/'.$newname;
            $image = Input::file('profileImage');
            // create instance resize image to fixed size
            Image::make($image->getRealPath())->resize('180','180')->save($target);
            $newProfileImage = $target;
        }
        else{
            $newProfileImage = $user->profile_path;
        }

        $info = pathinfo($_FILES['bannerImage']['name']); //get information about the temporary file
        if (!$info['filename']=='')
        {
            $ext = $info['extension']; // get the extension of the file
            $newname = rand(0 ,9999999999).'.'.$ext;
            $target = 'images/'.$newname;
            $image = Input::file('bannerImage');
            // create instance resize image to fixed size
            Image::make($image->getRealPath())->resize('850','280')->save($target);
            $newBannerImage = $target;
        }
        else{
            $newBannerImage = $user->banner_path;
        }

        //Retrieve the user which is being modified.
        $user = User::find($id);

        //Update the field in the database.
        DB::table('users')
            ->where('id', $id)
            ->update(array(
                'name' => $newName,
                'city' => $newCity,
                'region' => $newRegion,
                'country' => $newCountry,
                'profile_path' => $newProfileImage,
                'banner_path' => $newBannerImage,
                'biography' => $newBiography
            ));

        //Redirect to the newly modified profile (using the username taken from user object.)
        return redirect('/profile/'.$user->username);
    }

    /**
     * This function will be called when a user click the follow button on another users profile.
     * It will check they are not following them selves/someone they have already followed.
     * This function will then add a new row to the subscriptions table adding the currently logged in user
     * and the id of the user they are subscribing to.
     *
     * @param $id
     *          The unique id of the person you wish to follow(subscribe to)
     * @return $this return a change of status to the button to display state change(subscribed)
     */
    public function follow($id)
    {
        //Only currently logged in users can follow other users.
        if(Auth::check())
        {
            $userToFollow = User::find($id)->username;
            //Get the user object from the currently logged in session.
            $currentUserId = Auth::user()->id;

            //This function will check they are not following them selves/someone they have already followed.

            //It will check they are not following them selves/someone they have already followed.
            if($id == $currentUserId)
                return back();


            //This function will then add a new row to the subscriptions table adding the currently logged in user and the id of the user they are subscribing to.
            $subscription = new Subscription;

            $subscription->user_id=$id;
            $subscription->subscriber=$currentUserId;

            $subscription->save();
            
            //This function will redirect a change of status to the button to display state change(subscribed)
            return back();
        }
        return redirect()->route('login');
    }

    /**
     * This function will be called when a user clicks the unfollow button on another users profile.
     * It will remove a row in the subscription table where the currently logged in user is folowing the target
     * It may in the future remove all rows associated from the feed table.
     * @param $id
     *          The unique id of the person you wish to unfollow
     * @return $this return a change of status to the button to display state change(not subscribed)
     */
    public function unfollow($id){
        //Only currently logged in users can unfollow other users.
        if(Auth::check())
        {
            $userToFollow = User::find($id)->username;
            //Get the user object from the currently logged in session.
            $currentUserId = Auth::user()->id;

            //This function will check they are not following them selves/someone they have already followed.

            //It will check they are not trying to unfollow them selves.
            if($id == $currentUserId)
                return back();

            //testing
            //return "you are user ".$currentUserId." and you are now unsubscribed from user ".$id;

            //retrieve the subscription object from the database and delete it.
            $subscription = Subscription::where('user_id',$id)->where('subscriber',$currentUserId)->first();

            $subscription->delete();

            //This function will redirect a change of status to the button to display state change(subscribed)
            return back();
        }
        return redirect()->route('login');
    }
}
