<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'ListingController@get_home_web');//for home

Route::get('/listing/{id}', 'ListingController@get_listing_web');//for listing

Route::get('/test', function(){
    $data = \App\Listing::get();
    // return $data;
    // return $data->toJson();
    dd($data);
});

