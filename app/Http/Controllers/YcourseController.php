<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Special;
use App\Models\Ycourse;
use Illuminate\Http\Request;

class YcourseController extends Controller
{
    public function index()
    {
        // $olduniversity = Olduniversity::all();
        $ycourses = Ycourse::latest()->paginate(10);
        return view('ycourses.index', compact('ycourses'));
    }

    public function create($special_id)
    {
        $specials =Special::find($special_id);
        $courses = $specials->courses;
        return view('Ycourses.create',compact('courses','special_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hours' => 'required',

        ]);

        $ycourses = (new Ycourse())->create($request->all());


        return redirect()->route('ycourses.index')
            ->with('success', 'uni created');
    }
    public function edit($id)
    {
        // $olduniversity = Olduniversity::all();
        $courses = Course::all();
        $ycourses = Ycourse::find($id);
        return view('ycourses.edit', compact('ycourses','courses'));
    }
    public function update(Request $request, $id)
    {
        $ycourses = Ycourse::find($id);
        $request->validate([
            'name'=>'required',
            'hours'=>'required',

        ]);

        $ycourses -> name = $request->name;
        $ycourses -> hours = $request->hours;

        $ycourses ->save();


        return redirect()->route('ycourses.index')
        ->with('success','uni updatet');

    }
    public function destroy(Ycourse $ycourse)
    {
        $ycourse->delete();
        return redirect()->route('ycourses.index')
        ->with('success','uni deleted');
    }
}
