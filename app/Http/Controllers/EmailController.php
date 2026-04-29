<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class EmailController extends Controller
{
    //
    public function sendmail(Request $req)
    {
        $toemail= "priyanshu.sinha12345@gmail.com";
        $message= "Hii, How are you?";
        $subject= "greetings";
        Mail::to($toemail)->send(new WelcomeMail($subject, $message));
        return "Email send successfully";
    }
}
