<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::with('contact')->get();
        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::create([
            'name' => 'tester',
            'age' => 23,
            'gender' => 'M'
        ]);
        $student->contact()->create([
            'email' => 'tester@example.com',
            'phone' => '1234567890'
        ]);
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

// // In studentController.php
// use App\Models\Contact;
// use App\Models\Student;
// class StudentController extends Controller {
//     public function show(){
//         $student = Student::where('name','test')->withWhereHas('contact',['email' => 'test@example.com'],function($query){
//             $query->where('email','test@example.com');
            
//         })->get();
//         //contact is function name in Student model
//         return $student;
//     }
// }

//in studentController.php
// use App\Models\Student;
//use App\Models\Book;
class BookController extends Controller {
    public function create(){
        $book = Student::find(2);
        $book->post()->createMany([
            [ 'email' => 'jhodoie@gmail.com','name'=> 'John Doe'],
            [ 'email' => 'jane@example.com','name'=> 'Jane Doe']
        ]);
    }
}
