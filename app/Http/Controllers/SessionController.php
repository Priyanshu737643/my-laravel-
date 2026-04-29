<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // fetch all the default session
    public function show()
    {
        $value=session->all();
        echo "<pre>";
        print_r($value);
        echo "<pre>";
    }

    // store session
    public function storesession(Request $request)
    {
        session([
            "name"=>"LPU",
            "course"=>"Btech"
        ]);
        return redirect("/get");
    }

    // fetch using has() and exists()
    public function fetch()
    {
        //? using has() and exists() method to get the session values

        // using has()
        if(session()->has("name")){
            return "user session exists";
        }else{
            return "user session does not exists";
        }

        // using exists()
        if(session()->exists("name")){
            return "user key exist";
        }else{
            return "user key does not exists";
        }

        //? using only and except method
    }

    // delete session
    public function deletesession()
    {
        session()->forget("name");
        echo "session deleted";
    }
}
