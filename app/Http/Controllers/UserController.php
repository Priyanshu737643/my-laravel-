<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public function adduser(UserRequest $request)
    {
        // return $request->all(); //? return all the form data

        // $request->validate([
        //     "username"=>"required|string|max:20",
        //     "useremail"=>"required|email",
        //     "userage"=>"required|numeric|between:18,26",
        //     "city"=>"required",
        // ],
        // [
        //     'username.required'=>"User Name is mandatory.",
        //     'username.string'=>"User Name should be string only.",
        //     'username.max:20'=>"User Name length should not exceed 20.",
        //     'useremail.required'=>"User Email is required.",
        //     'useremail.email'=>"Enter the correct emial address.",
        //     'userage.required'=>"User Age is required.",
        //     'userage.numeric'=>"User Age must be a number.",
        //     'userage.between:18,26'=>"User Age should be not less than 18.",
        // ]);

        // return $request->all();
        // return $request->only(['username','city']); //? to fetch the particular attribute
        return $request->except(['useremail']); //? to exclude a particular attribute
    }
}
