<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;


class StudentApiController extends Controller
{
    public function createStudent(Request $request) 
    {
        $validatedRequest = $request->validate([
            'firstName'         => 'required|string|max:255',
            'lastName'          => 'required|string',
            'email'             => 'required|string',
            'gender'            => 'required|in:male,female',
        ]);

        $student = new Student();
        
        $student->first_name = $validatedRequest['firstName'];
        $student->last_name = $validatedRequest['lastName'];
        $student->email = $validatedRequest['email'];
        $student->gender = $validatedRequest['gender'];
        
        $student->save();
        return response()->json(['message' => __('Student Created Successfully')], 201);
    }

    public function getStudents(Request $request)
    {
        $students = Student::all();

        return response()->json(  $students );

    }

    public function getDeleteStudent($student_id) {
          $student = Student::where('id',$student_id)->first()->delete(); 
        // return redirect()->route('display')->with(['message'=> 'Successfully deleted!!']);
        return response()->json(['message'=> 'Successfully deleted!!']);
      } 

      public function edit($id)
      {
        $student = Student::find($id);
        $student_id = $student->id;
        // return redirect()->route('edit', [$student_id]);
       return response()->json($student);
      }
  
      public function update($id, Request $request)
      {
        $student = Student::find($id);
  
        $student->update($request->all());
  
        return response()->json('successfully updated');
      }
}
