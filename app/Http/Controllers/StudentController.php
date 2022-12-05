<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    function index() 
    {
        return view('index');
    }

    function display()
    {
        return view('display');
    }
    function edit(Request $request)
    {
        $student = Student::findOrFail($request->id);
        return view('edit')->with([
            'id' => $student->id,
        ]);
    }
 
}
