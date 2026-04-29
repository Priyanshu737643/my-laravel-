<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //* function 1
    public function read(){
        // echo "hello everyone", "<br>";
        // return ("my first basic controller file");
        return view("welcome");
    }

    //* function 2
    public function show1(){
        $students=[
        "name"=>"Amrit",
        "course"=>"Web development",
        "id"=>24,
        "email"=>"abc123@gmail.com"
    ];
    return response()->json($students);
    }
    //* function 3
    public function simple(){
        return "response from simple";
    }

    //* function 4
    public function jsonres(){
        return "json response";
    }

    //* function 5
    public function show($num){
        return "table num response form show" . $num;
    }
}

