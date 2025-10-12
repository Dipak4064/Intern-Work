<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents()
    {
        $students = DB::table('students')
            ->join('cities', 'students.city', '=', 'cities.id')
            // ->select('students.*', 'cities.city_name')
            ->select(DB::raw('count(*) as student_count'),'city_name')
            ->groupBy('city_name')
            ->orderBy('student_count','asc')
            // ->having('cities.city_name', 'like', 'N%')
            ->havingBetween('student_count',[5,9])
            ->get();
            return $students;
            // return view('jointable', compact('students'));
    }
}
;
