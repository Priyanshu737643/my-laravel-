<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //?
        // Student::Create([
        //     "name"=>"Raj",
        //     "email"=>"abc@gmail.com",
        //     "age"=>15,
        // ]);

        //? insert multiple record
        // $student = collect([
        //     [
        //         'name'=>"Amrit",
        //         'email'=>"amrit@gmail.com",
        //         'age'=>16,
        //     ],
        //     [
        //         'name'=>"Amrit",
        //         'email'=>"amrit@gmail.com",
        //         'age'=>16,
        //     ],
        //     [
        //         'name'=>"Amrit",
        //         'email'=>"amrit@gmail.com",
        //         'age'=>16,
        //     ],
        //     [
        //         'name'=>"Amrit",
        //         'email'=>"amrit@gmail.com",
        //         'age'=>16,
        //     ]
        // ]);

        //?
        // $students->each(function($student){
        //     Student::insert(student);
        // });

        //? using json file
        // $json= File::get(path:'database/json/student.json');
        // $students=collect(json_decode($json));

        // $students->each(function($student){
        //     student::create([
        //         'name'=>$student->name,
        //         'email'=>$student->email,
        //         'age'=>$student->age
        //     ]);
        // });

        //? using fake() method
        for($i=1; $i<=10; $i++)
        Student::Create([
            'name'=>fake()->name(),
            'email'=>fake()->unique()->email(),
            'age'=>fake()-age(),
        ]);
    }
}
