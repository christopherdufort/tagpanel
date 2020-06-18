<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Location;
use Redirect;
use App\Http\Requests;

class LocationsController extends Controller
{
    /**
     * Deletes a specified location from the database.
     * @param $id   The Id of the specific location to delete.
     * @return mixed
     */
    public function delete($id)
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if ($user->admin === 1)
            {
                $location = Location::find($id);

                $location->delete();
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

            //If user is an admin they may proceed.
            if ($user->admin == 1 )
            {
                //without ->get() returns a eloquent built object to be perform on.
                $location = Location::where(['id' => $id])->firstOrFail();

                return view('locations/edit')->with('location', $location);
            }
            else{
                abort('403');
            }
            return Redirect::back();
        }
        //Redirect user to login page.
        return redirect()->route('login');
    }

    public function update()
    {
        //Check if they are logged in
        if (Auth::check()) {
            //Get the user object from the logged in session.
            $user = Auth::user();
            //persist the change only if you are an admin
            if ($user->admin == 1) {
                //Get the id of the category to modify
                $categoryId = Request::get('category_id');

                //Get the existing category from the db
                $category = Category::where(['id' => $categoryId])->first();

                //Get new name provided by admin
                $newCategoryName = Request::get('category_name');

                //If they submitted empty/null use current title
                if (!isset($newCategoryName) || trim($newCategoryName) === '') {
                    $newCategoryName = $category->category;
                }


                //Update the field in the database.
                DB::table('categories')
                    ->where('id', $categoryId)
                    ->update(array(
                        'category' => $newCategoryName
                    ));
                //return to category dasbhoard.
                return redirect('/dashboard/categories');
            } else {
                abort(403, 'Unauthorized action.');
            }
            return Redirect::back();
        }
        //Redirect user to login page.
        return redirect()->route('login');
    }
}
