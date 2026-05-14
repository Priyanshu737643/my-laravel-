<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //? using query builder
    public function showuser()
    {
        $users=DB::table('students')->get();
        return($users);  //? return in json format
        // dd($users);
        // dump($users);
        return view("student", ['data'=>$users]);

        // $users=DB::table('students')->find(4);
        // return $users;
    }

    public function singleuser(string $id){
        $users= DB::table('students')->where('id', $id)->get();
        return $users;
    }

    //? using ORM method
    public function show()
    {
        $students=Student::all();
        return $students;
    }
}
