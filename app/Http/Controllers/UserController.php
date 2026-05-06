<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\Uppercase;

class UserController extends Controller
{
    //
    public function adduser(Request $request)
    {
        // return $request->all(); //? return all the form data

        $request->validate([
            "username"=>["required", new Uppercase],
            "useremail"=>"required|email",
            "userage"=>"required|numeric|min:18",
            "city"=>"required",
        ]);
        return $request->all();

        
    }
}
