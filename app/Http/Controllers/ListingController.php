<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingController extends Controller
{   
    private function get_listing($list, $id)
        {
            for($i = 1; $i <=4; $i++) {
                $list['image_' . $i] = asset(
                'images/' . $id . '/Image_' . $i . '.jpg'
                );
        }
    return $list; // Return image to app.blade.php
}


    public function get_listing_api($id)
        {
            // dd($request->category);
            // return $name;
            // return $_REQUEST;
            $list = Listing::find($id);
            return $list;
        }

    public function get_listing_web($id)
        {
            // dd($request->category);
            // return $name;
            // return $_REQUEST;
            $list = Listing::find($id)->toArray();
            // dd($list->toArray());
            // dd($list);
            $list = $this->get_listing($list,$id);
        
            return view('app', ['data' => $list]);
        }

    public function get_home_web()
        {
            $collection = Listing::all([
                'id', 'address', 'title', 'price_per_night'
                ]);
            $collection->transform(function($listing) {
                $listing->thumb = asset(
                    'images/' . $listing->id . '/Image_1_thumb.jpg'
                );
            return $listing;
            });
            $data = collect(['listings' => $collection->toArray()]);
            return view('app', compact('data'));
        }
}
