<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('DashboardStudentIndex', [
            'students' => Student::paginate(10),
            'classes' => Group::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('DashboardStudentForm', [
            'classes' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $validatedData = $request->validate([
           'student_name' => 'required|max:255',
            'group_id' => 'required',
            'dob' => 'required|date'
        ]);
        $student->student_name = $validatedData['student_name'];
        $student->group_id = $validatedData['group_id'];
        $student->dob= $validatedData['dob'];

        $student->save();

        return redirect()->route('student.index')->with('message', 'New student successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return inertia('DashboardStudentForm', [
            'student' => Student::find($id),
            'classes' => Group::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $validatedData = $request->validate([
            'student_name' => 'required|max:255',
            'group_id' => 'required',
            'dob' => 'required|date'
        ]);
        $student->student_name = $validatedData['student_name'];
        $student->group_id = $validatedData['group_id'];
        $student->dob= $validatedData['dob'];

        $student->save();

        return redirect()->route('student.index')->with('message', 'Selected student successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();

        return back()->with('message', 'Selected student successfully deleted');
    }
}
