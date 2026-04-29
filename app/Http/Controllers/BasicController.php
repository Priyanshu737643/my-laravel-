<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class BasicController extends Controller
{
    //
    public function handleform(Request $request)
    {
        $name = $request->input('name');
        return "Form Submitted ! Name: " . $name;
    }
}
