<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//! basic routing
Route::get("/abc/as", function (){
    echo "good morning<br> ";
    return "hello world";
});

//! routing parameter
Route::get("/user/{id}", function ($id){
    return "User Id: " . $id;
})->whereNumber("id");


// Route::get("/user/{id}", function ($id){
//     return "User Id: " . $id;
// })->whereAlpha("id");


// Route::get("/user/{id}", function ($id){
//     return "User Id: " . $id;
// })->whereAlphaNumeric("id");


//! optional parameter ( the second parameter is optional)
Route::get("/user1/{id?}", function ($id=null){ //? default value
    return "User Id: ". $id;
});

//! TASK - 1
Route::get("/table/{num}", function ($num){
    return "<b>Multiplication Table :</b><br> " . $num . " x 1 = " . $num*1 . "<br> " . $num . " x 2 = " . $num*2 . "<br> " . $num . " x 3 = " . $num*3 . "<br> " . $num . " x 4 = " . $num*4 . "<br> " . $num . " x 5 = " . $num*5 . "<br> " . $num . " x 6 = " . $num*6 . "<br> " . $num . " x 7 = " . $num*7 . "<br> ". $num . " x 8 = " . $num*8 . "<br> ". $num . " x 9 = " . $num*9 . "<br> " . $num . " x 10 = " . $num*10 . "<br> " ;
});

// Route::get("/table/{num}", function ($num){
//     $table = "<table border='1'>";
//     for($i=1; $i<=10; $i++){
//         $table .="<tr><td>" . $num . " x " . $i ."<tr><td>" . ($num * $i) . "</td></tr>";
//     }
//     $table .= "</table>";
//     return $table;
// })->whereNumber("num");

//* print student details using blade template and controller
//! TASK - 2
Route::get("/students", function () {
    return view("student", [
        "students" => [
            ["name"=>"Raj", "id"=>121, "course"=>"BBA"],
            ["name"=>"Abhi", "id"=>131, "course"=>"BTECH"],
            ["name"=>"Suraj", "id"=>141, "course"=>"BCA"],
            ["name"=>"Kartik", "id"=>151, "course"=>"MCA"],
        ]
    ]);
});

// Route::get("/student/{sname}/{id}/{course}", function ($name, $id, $course){
//     return "<b>Student Information :</b> <br> Student Name : ABC  <br>Student Id : 121  <br>Course : Btech";
// });


//! Fallback method  - to customize built-in error message
Route::fallback(function()
{
    return "<h1> PAGE NOT FOUND </h1>";
});


//! Multiple Parameters
Route::get("/sum/{n1}/{n2}", function($n1,$n2)
{
    return "Sum of two numbers: " . $n1+$n2;
})->whereNumber("n1");



//* Named Routes    ------------------------------------------------------
Route::get("/home", function()
{
    return view("home");
});

Route::get("/aboutus", function()
{
    return view("about");
})->name("about");

Route::get("/welcome", function()
{
    return view("welcome");
});

//! Redirect method
Route::redirect("/welcome" , "test");

Route::get("/test", function (){
    return view("test");
});


//* Route using View method  ---------------------------------------------

// Route::view("/", "student");
// passing data to views
//? 1) associative array
//? 2) with()
//? 3) compact()
//? 4) withName()

//! Array
Route::get("/hello", function()
{
    return view("hello",["name"=>"Raj"]);
});

//! with() 
Route::get("/with", function()
{
    return view("hello")->with("name","Raj");
});


//! compact()

// static data
Route::get("/comp", function()
{
    $name = "Raj";
    return view("hello", compact('name'));
});

// dynamic data
Route::get("/comp/{name}", function($name)
{
    return view("hello", compact('name'));
});

//! withName()
Route::get("/withnm", function()
{
    $name = "Amrit";
    return view("hello")->withName("$name");
});

//* Examples  -------------------------------------------------

// example 1
// Route::get("/", function()
// {
//     return "Welcome to laravel";
// });

// example 2
Route::get("/view", function()
{
    return view("hello");
});

//* Response  -----------------------------------------------------------

// example 3 - json response
Route::get("/jsn", function()
{
    $students=[
        "name"=>"Amrit",
        "course"=>"Web development",
        "id"=>24,
        "email"=>"abc123@gmail.com"
    ];
    //* both converts array -> json
    // return ($students); //? without json
    return response()->json($students);
});

//! example 4 - redirect
// Route::get("/jsn", function(){
//     return response()->redirect("welcome");
// });

// example 5 - custom error msg
Route::get("/notfound", function(){
    return response("Page not found", 404);
});

// example 6 - response() -> view()
Route::get("/hii", function(){
    return response()->view("welcome");
});

//* adding header via routes   ---------------------------------------------
Route::get("/hdn", function(){
    return response("welcome to laravel")->header("content-type", "text/plain");
});

//! header chaining
// example - 1
Route::get("/header", function()
{
    return response("Hello, this is a response with header")->header("content type", "text/plain")->header("Custom-Header", "CustomValue");
});

// example -2
Route::get("/hdr", function()
{
    return response("welcome to my laravel project")->header("X-Welcome-Header", "welcome to laravel");
});

//* Cookies   --------------------------------------------------------
//? 1. create/set the cookie
Route::get("/set-cookie", function()
{
    $cookie = cookie("abc","raj", 5); // 5 minutes
    return response("cookie has been set")->cookie($cookie);
});

//? 2. fetch/get the value of cookie
Route::get("/get-cookie", function()
{
    $username = request()->cookie("abc");
    return response("Username: " . ($username?? "cookie name not found"));
}); 

//? 3. delete the cookie
Route::get("delete-cookie", function()
{
    $cookie = Cookie::forget("abc");
    return response("cookie has been deleted ")->withCookie($cookie);
});

//* Cookie Facade  -  Cookie::queue(name, value, minutes);
//* queue() means Laravel prepares the cookie and attaches it to the outgoing
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

// Set cookie using Cookie facade
Route::get("/set-cookie-facade", function(){
    Cookie::queue("user", "raj", 5);
    return "User cookie set!";
});

// Get cookie
Route::get("/get-cookie-facade", function(){
    $username = Cookie::get("user");
    return response("Username: " . ($username?? "cookie name not found"));
});

//Delete cookie
Route::get("/delete-cookie-facade", function(){
    Cookie::queue(Cookie::forget("raj"));
    // Cookie::queue("user, raj, -1");
    return "cookie deleted";
});

//* Array built-in methods  -------------------------------------------
Route::get("/array", function () {
    return view("array", [
        "students" => [
            ["name"=>"Raj", "id"=>121, "course"=>"BBA"],
            ["name"=>"Abhi", "id"=>131, "course"=>"BTECH"],
            ["name"=>"Suraj", "id"=>141, "course"=>"BCA"],
            ["name"=>"Kartik", "id"=>151, "course"=>"MCA"],
        ]
    ]);
});

//* String built-in methods  ------------------------------------------
Route::get("/string", function () {
    return view("string", [
        "text" => "Hello Priyanshu, Welcome to Laravel Blade!"
    ]);
});


//* Sub-View  -------------------------------------------------------------
Route::get("/subview", function(){
    return view("admin.hello");
});


//* Dynamic Greeting
// sharing data with views  --- dynamic data

Route::get("/", function(){
    return view("greet", ['name'=>"raj"]);
});

Route::get("/greet/{name}", function($name)
{
    return view("greet", ['name'=>$name]);
})->whereAlpha('name');


//* Function
Route::get("/function/{n}", function($n){
    return view("function", compact('n'));
})->whereNumber('n');

//* Template Inheritance
Route::view("/layout","layout");
Route::view("/hm","admin.home");
Route::view("/abt","admin.about");
Route::view("/contact","contact");

Route::view("/app","app");

//* Controllers

// Basic Controller
use App\Http\Controllers\FirstController;
Route::get("/first-read", [FirstController::class, "read"]);
Route::get("/first-show", [FirstController::class, "show"]);

// Single Controller
use App\Http\Controllers\SingleController;
Route::get("/single", SingleController::class);

// Resource Controller
use App\Http\Controllers\ResourceController;
// Route::get("/user-index", [ResourceController::class, "index"]);
// Route::get("/user-create", [ResourceController::class, "create"]);
Route::resource("/user", ResourceController::class);

//* Group Routing  ---  group function
Route::controller(FirstController::class)->group(function(){
    Route::get("/read","read");
    Route::get("/table/{num}","show");
    Route::get("/response","simple");
    Route::get("/jsn","jsonres");
});


//* example with prefix
Route::prefix("first")->controller(FirstController::class)->group(function(){
    Route::get("/read","read");
    Route::get("/table/{num}","show");
    Route::get("/response","simple");
    Route::get("jsn","jsonres");
});

//* Middleware  -------------------------------------------------------
//? Route Middleware
//? Group Middleware
//? Global Middleware
use App\Http\Middleware\TestMiddleware;
Route::get("/read/{num}",[FirstController::class,"read"])->middleware(TestMiddleware::class);

//* blade directives  -- apply middleware for single route
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;
// the AgeCheck and CountryCheck middleware will run before this route
Route::get("/tmp", function(){
    return view("admin.home");
})->middleware(AgeCheck::class,CountryCheck::class);
// http://127.0.0.1:8000/tmp?age=25&country=India

//* Group Middleware
// the AgeCheck middleware will run before all these routes
Route::middleware(AgeCheck::class)->group(function()
{
    Route::view("/layout","layout");
    Route::view("/hm","admin.home");
    Route::view("/abt","admin.about");
    Route::view("/contact","contact");
    Route::view("/app","app");
});

//* Global Middleware
// bootstrap/app.php
//? Inside withMiddleware ==> $middleware->append(\App\Http\AgeCheck::class);
// now no need to use the path of middleware in web.php

//* Secure Routing
// middleware
// breeze  = create all the in-built file

//? 1 create a new project
// Composer create-project laravel/laravel myapp
// cd myapp

//? 2 Install authorization (breeze)
// Composer require laravel/breeze --dev
// php artisan install:breeze
// select blade , dark mode -> enter , testin framework -> pest
// php artisan migrate
// npm install
// php artisan serve

//? Email
use App\Http\Controllers\EmailController;
use App\Mail\WelcomeEmail;
Route::get('/mail',[EmailController::class, 'sendmail']);

//? Upload File
Route::view('/upload', "uploadFile");
Route::get("/upload", function(){
    return view("uploadFile");
});

use App\Http\Controllers\UploadController;
Route::post("/upload", [UploadController::class, "uploadFunc"]);

//* SESSIONS --------------------------------------------------------

// sessions-first to check the default sessions by laravel
Route::get("/all", function()
{
    $value = session()->all();
    echo "<pre>";
    print_r($value);
    echo "<pre>";
});

// create/store your own session using session helper

Route::get("/store-session", function()
{
    session(["user"=>"sukh"]);  //? usong session helper
    //? using put method
    session()->put("class","laravel");
    echo "session created/stored";
    return redirect("/all");
});

// how to read/get the session value
Route::get("/get-session", function()
{
    // $value=session("user");  //? using helper method
    // echo "The value of session:" . $value;

    //? using get method
    $val = session()->get("class");
    echo "The value of session: " .$val;
});

// delete/destroy the session
Route::get("/delete-session", function()
{
    session()->forget("user");
    echo "session deleted";
});

// example usong controller with session
use App\Http\Controllers\SessionController;

Route::get("/get",[SessionController::class,"show"]);
Route::get("/store",[SessionController::class,"storesession"]);
Route::get("/fetch",[SessionController::class,"fetch"]);
Route::get("/delete-session",[SessionController::class,"deletesession"]);


//* Form Validation  --------------------------------------------------

use App\Http\Controllers\UserController;
Route::view("/form", "adduser");
Route::post("/adduser", [UserController::class, "adduser"]);

//* Query Builder for inserting the record
use Illuminate\Support\Facades\DB;

Route::get("/add-user", function()
{
    DB::table('students')->insert(
        [
            'name'=>"Supriya",
            'email'=>"spr143@gmail.com",
            'age'=>26,
            'created_at'=>now(),
            'updated_at'=>now()
        ]
    );
    return "student record inserted";
});

//* Fetching the record
Route::get("/all-user",function(){
    $students=DB::table('students')->get();
    // return($students);
    dd($students);  //? dd = dump & die
    // dump($students);
    // foreach($students as $student)
    //     {
    //         echo $student->name. "-" .$student->email. "<br>";
    //     }
});

//* Get single record with conditions
Route::get("/users/{id}", function($id)
{
    $students= DB::table('students')->where("id", $id)->first();
    dd($students);
});

//* Update data using query Builder
Route::get("/update-user/{id}", function($id){
    DB::table('students')->where('id', $id)->update(['name'=>"updated name"]);
    return "Student record updated";
});

//* Delete record
Route::get("/delete-user/{id}", function($id)
{
    DB::table('students')->where("id", $id)->delete();
    return "Student record deleted";
});


//* 
Route::get("/allstd", [StudentController::class, "show"]);

//* ORM with model, controller and view
use App\Http\Controllers\StdController;
//* crud operations
Route::get('/students', [StdController::class,'index']);

Route::get('/students/create', [StdController::class,'create']);

Route::post('/students/store', [StdController::class,'store']);

Route::get('/students/edit/{id}', [StdController::class,'edit']);

Route::post('/students/update/{id}', [StdController::class,'update']);

Route::get('/students/delete/{id}', [StdController::class,'destroy']);