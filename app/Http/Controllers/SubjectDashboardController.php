<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('DashboardIndex', [
            'name' => 'subject',
            'data' => Subject::paginate(50),
            'columns' => ['id', 'subject name', 'action'],
            'actions' => ['show', 'edit']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('DashboardSubjectForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject;
        $validatedData = $request->validate([
            'subject_name' => 'required|max:255'
        ]);

        $subject->subject_name = $validatedData['subject_name'];

        $subject->save();
        return redirect()->route('subject.index')->with('message', 'New subject has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return inertia('DashboardSubjectShow', [
            'subject' => Subject::find($id),
            'courses' => Subject::find($id)->courses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return inertia('DashboardSubjectForm', [
            'subject' => Subject::find($id)
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
        $subject = Subject::find($id);
        $validatedData = $request->validate([
            'subject_name' => 'required|max:255'
        ]);

        $subject->subject_name = $validatedData['subject_name'];

        $subject->save();
        return redirect()->route('subject.index')->with('message', 'Selected subject has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();

        return back()->with('message', 'Selected subject has been deleted');
    }
}
