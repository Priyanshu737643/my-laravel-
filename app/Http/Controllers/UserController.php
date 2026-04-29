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
            "username"=>"required",
            "useremail"=>"required",
            "userage"=>"required",
            "city"=>"required",
        ]);
        return $request->all();
    }
}
