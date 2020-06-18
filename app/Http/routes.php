<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'Auth\AuthController@getLogin');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//
///*home pages and default landing pages*/
//Route::get('/','HomeController@index');
//Route::get('/index','HomeController@index');
//Route::get('/home','HomeController@index');
//Route::post('/home','HomeController@geolocation');
//
///*Route to validate an email address by associated confirmation code*/
//Route::get('register/verify/{confirmationCode}', [
//    'as' => 'confirmation_path',
//    'uses' => 'Auth\AuthController@confirm'
//]);
//
////Static Page Routes...
//Route::get('contact','PagesController@contact');
//Route::get('about', 'PagesController@about');
//Route::get('services', 'PagesController@services');
//Route::get('faq', 'PagesController@faq');
//Route::get('privacy', 'PagesController@privacy');
//Route::get('terms', 'PagesController@terms');
////Route::get('pricing', 'PagesController@pricing'); Comming soon
////Route::get('blog', 'BlogController@index'); Comming soon
//
////the following need authorization (must be logged in)
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/profile/{username}', 'UsersController@show');
//    Route::get('/profile/edit/{id}', 'UsersController@edit');
//    Route::get('/profile/follow/{id}', 'UsersController@follow');
//    Route::get('/profile/unfollow/{id}', 'UsersController@unfollow');
//    Route::get('/profile/feed/{id}', 'UsersController@feed');
//    Route::get('users/delete/{id}', 'UsersController@delete');
//    Route::post('profile', 'UsersController@update');
//    //ensure that the specific route come before wildcard routes
//    Route::get('tags/create', 'TagsController@create');
//    Route::get('tags/delete/{id}', 'TagsController@delete');
//    Route::get('tags/edit/{id}', 'TagsController@edit');
//    Route::post('tags/create', 'TagsController@store');
//    Route::post('tags/edit', 'TagsController@update');
//
//    Route::get('dashboard', 'DashboardController@index');
//    Route::get('dashboard/tags', 'DashboardController@tags');
//    Route::get('dashboard/categories', 'DashboardController@category');
//    Route::get('dashboard/users', 'DashboardController@users');
//    Route::get('dashboard/locations', 'DashboardController@locations');
//
//    Route::get('location/edit/{id}', 'LocationsController@edit');
//    Route::post('location/update', 'LocationsController@update');
//    Route::get('location/delete/{id}', 'LocationsController@delete');
//
//    Route::get('category/create', 'CategoriesController@create');
//    Route::post('category/store', 'CategoriesController@store');
//    Route::get('category/edit/{id}', 'CategoriesController@edit');
//    Route::post('category/update', 'CategoriesController@update');
//    Route::get('category/delete/{id}', 'CategoriesController@delete');
//
//});
//
////Moved outside of the authorization to fix bug with ajax return-> but will do nothing if not logged in
//Route::get('tags/like/{id}', 'TagsController@like');
//
////Route::get('tags','TagsController@index');
//
////wildcard routes always after non wildcads
//Route::get('panels','PanelsController@panels');
//Route::get('panels/{country}','PanelsController@regions');
//Route::get('panels/{country}/{region}','PanelsController@localities');
//Route::get('panels/{country}/{region}/{city}','TagsController@index');
//Route::get('panels/{country}/{region}/{city}/{searchCategory}','TagsController@index');
//
////Route::get('panels/{city}','TagsController@index');
////searching
////Route::post('panels/{city}', 'TagsController@index');
//Route::post('panels/search', 'TagsController@search');
//Route::post('autofill/search', 'TagsController@autofill');
//
//Route::get('tags/{id}','TagsController@show');
//
//Route::get('auth/created','Auth\AuthController@created');
//
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
//
//Route::auth();
////Route::get('/home', 'HomeController@home');
//
////TESTING INFO
//Route::get('/info', 'DashboardController@info');
//Route::POST('/info', 'DashboardController@test');

