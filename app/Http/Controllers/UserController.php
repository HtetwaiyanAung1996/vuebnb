<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function toggleSaved(Request $request) {

        $id = $request->a;
        $user = Auth::user();
        $saved = $user->saved;
        //array_search method is used to get the key within the array
        $key = array_search($id, $saved);

        if ($key === FALSE) {
            array_push($saved, $id);
        } else {
            array_splice($saved, $key, 1);
        }
        // return $saved;
        $user->saved = $saved;
        $user->save();
        //response empty json
        return response()->json();
    }
}
