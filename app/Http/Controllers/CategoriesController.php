<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Auth;
use App\Category;
use Redirect;
use Request;
use DB;
//use App\Http\Requests;

class CategoriesController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if ($user->admin === 1) //The user is an admin..
            {
                return view('categories/create');
            }
            return Redirect::back();
        }
        return redirect()->route('login');

    }
    public function store()
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if ($user->admin === 1) //The user is an admin..
            {
                return "added ".Request::get('name');
                //Create a new category
                $category = new Category([
                    'name' => Request::get('name')
                ]);

                //Persist the category to the database.
                $category->save();
            }
            return Redirect::back();
        }
        return redirect()->route('login');

    }
    //
    public function delete($id)
    {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if ($user->admin === 1)
            {
                $category = Category::find($id);

                $category->delete();
            }
            return redirect()->route('/dashboard/categories');
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
                $category = Category::where(['id' => $id])->firstOrFail();

                return view('categories/edit')->with('category', $category);
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
