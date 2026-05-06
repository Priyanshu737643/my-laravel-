<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\Uppercase;

use Illuminate\Support\Facades\Validator;
use Closure;

class UserController extends Controller
{
    //
    public function adduser(Request $request)
    {
        // return $request->all(); //? return all the form data

        //? Validate method
        // $request->validate([
        //     "username"=>["required", new Uppercase],
        //     "useremail"=>"required|email",
        //     "userage"=>"required|numeric|min:18",
        //     "city"=>"required",
        // ]);
        // return $request->all();

        //? Closure method
        $validate=$request->validate(
            [
                'username'=>['required',
                    function(string $attribute, mixed $value, Closure $fail)
                    {
                        if(strtoupper($value)!==$value){
                            $fail("The :attribute must be uppercase");
                        }
                    }
                ],
                'useremail'=>"required|email",
            ]
        );
        // echo $validate["username"];  //? to print single record
        dd($validate);  //? dump & die
    }
}
