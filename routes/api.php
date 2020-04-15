<?php

use Illuminate\Http\Request;
use App\Listing;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/listing/{id}/extra/{name}', 'ListingController@get_listing_api');

Route::get('/listing/{id}', 'ListingController@get_listing_api');

Route::get('/', 'ListingController@get_home_api');

//for save page
Route::get('/saved', 'ListingController@get_home_api');

//for save listing saved into the database
Route::post('/user/toggle_saved', 'UserController@toggleSaved')->middleware('auth:api');

