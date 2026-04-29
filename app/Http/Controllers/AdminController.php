<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // apply middleware
    public function __construct()
    {
        // middleware applicable to all the functions
        $this->middleware("AgeCheck");

        // middleware applicable to some functions
        $this->middleware("AgeCheck")->only("show"); //? apply to specific function
        $this->middleware("AgeCheck")->except("show");  //? exclude this function

        // multiple middleware
        $this->middleware(["AgeCheck", "CountryCheck"]);
    }

    public function show(){
        return view("admin.home");
    }
    public function res(){
        return "response";
    }
}
