<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('DashboardGroupIndex', [
            'groups' => Group::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('DashboardGroupCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $validatedData = $request->validate([
           'group_name' => 'required|max:255',
           'year_level' => 'required',
        ]);

        $group->group_name = $validatedData['group_name'];
        $group->year_level = $validatedData['year_level'];

        $group->save();

        return redirect()->route('class.index')->with('message', 'New class has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return inertia('DashboardGroupShow', [
            'group' => Group::find($id),
            'students' => Group::find($id)->students
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
        return inertia('DashboardGroupEdit', [
            'group' => Group::find($id)
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
        $group = Group::find($id);
        $validatedData = $request->validate([
            'group_name' => 'required|max:255',
            'year_level' => 'required',
        ]);

        $group->group_name = $validatedData['group_name'];
        $group->year_level = $validatedData['year_level'];

        $group->save();

        return redirect()->route('class.index')->with('message', 'Selected class successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::find($id)->delete();

        return redirect()->route('class.index')->with('message', 'Selected class successfully deleted!');
    }
}
