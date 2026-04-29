<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function uploadFunc(Request $request)
    {
        // validation
        $request->validate([
            'file'=>'required|file|mimes:jpg,png,pdf,png|max:3000'
        ]);

        $path=$request->file('file')->store('images','public');
        return $path;

        // explode convert string into array
        $fileArray=explode('/', $path);
        $filename=$fileArray[1];
        return view('displayimage', ['path'=>'storage/images/' .$filename]);

        // return filename
        // $path=$request->file('file')->storeAs('images/'.$filename);
        // return $path;
    }
}
