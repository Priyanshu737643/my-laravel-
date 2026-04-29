<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function adduser(Request $request)
    {
        // return $request->all(); //? return all the form data
        $request->validate([
            "username"=>"required|string|max:20",
            "useremail"=>"required|email",
            "userage"=>"required|numeric|between:",
            "city"=>"required",
        ],[
            'username.required'=>""
        ]);
        return $request->all();
    }
}
