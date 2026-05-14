<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StdController extends Controller
{
    //? using ORM with views and controller
    //? view
    //  public function create()
    // {
    //     return view('std');
    // }

    //? controller
    // public function store(Request $request)
    // {
    //     Student::create([

    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'age' => $request->age

    //     ]);

    //     return "Data Inserted Successfully";
    // }

    //? READ DATA
    public function index()
    {
        $students = Student::all();

        return view('index', compact('students'));
    }

    //? SHOW FORM
    public function create()
    {
        return view('std');
    }

    //? INSERT DATA
    public function store(Request $request)
    {
        Student::create([

            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age

        ]);

        return redirect('/students');
    }

    //? EDIT FORM
    public function edit($id)
    {
        $student = Student::find($id);

        return view('edit', compact('student'));
    }

    //? UPDATE DATA
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;

        $student->save();

        return redirect('/students');
    }

    //? DELETE DATA
    public function destroy($id)
    {
        Student::destroy($id);

        return redirect('/students');
    }
}
