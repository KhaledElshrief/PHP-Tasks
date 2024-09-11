<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Track;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $students =DB::table('students')->get();
        return view('/student/student', ["students" => $students]);
    }

    public function create()
    {
        $tracks = Track::all();
        return view('/student/register',compact('tracks'));
    }

    public function store(Request $request)
    {

        $request->validate([
        'name'=>'required|max:500',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'email'=>'required|max:200|unique:students',
        'gender'=>'required|max:500',
        'track_id'=>'required'
    ]);

         $path;
           if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();

        $path = $request->image->storeAs('student', $imageName, 'public');

    }
    //  dd($path);

    $student = new Student;
    $student->name = $request->name;
    $student->email = $request->email;
    $student->gender = $request->gender;
    $student->track_id = $request->track_id;
    $student->address = $request->address;
    $student->image = $path;
    $student->save();
    return redirect('/Student');
}

public function show( $id){

        $student = Student::find($id);
        $track = Track::find($student['track_id']);


    return view('student.show',compact('student'),compact('track'));
}
}
