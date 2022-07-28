<?php

namespace App\Http\Controllers;

use App\Models\Olduniversity;
use App\Models\Collage;
use App\Models\Course;
use App\Models\Special;
use App\Models\Ycourse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelationController extends Controller
{
    public function getOlduniversityCollage()
    {

        $olduniversity = Olduniversity::find(8);
        $olduniversity->collage;
        $olduniversity::with('collage')->find(8);
        // return $olduniversity->name;
        $collages = $olduniversity->collage;
        /* foreach($collages as $item)
     {
         echo $item->name;
     }*/
        $collage = Collage::find(5);
        return $collage->olduniversity->name;
    }
    public function courses(Request $request)
    {
        $request->validate([
            'olduniversity_id' => 'required',
            'collage_id' => 'required',
            'special_id' => 'required',
        ]);
        $special_id = $request->special_id;
        $collage_id = $request->collage_id;
        $olduniversity_id = $request->olduniversity_id;

        $special = Special::find($special_id);
        $courses = $special->courses;
        $specialname = $special->name;
        $collage = Collage::find($collage_id);
        $collagename = $collage->name;
        $olduniversity = Olduniversity::find($olduniversity_id);
        $olduniversityname = $olduniversity->name;


        return view('courses.index', compact('courses'), compact('specialname', 'collagename', 'olduniversityname', 'olduniversity_id', 'collage_id', 'special_id'));
    }
    public function createCourse($special_id,$collage_id,$olduniversity_id)
    {
        return view('courses.create', compact('special_id', 'collage_id', 'olduniversity_id'));
    }
    public function createCourse2($special_id,$collage_id,$olduniversity_id)
    {

    }
    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hours' => 'required',
            'olduniversity_id' => 'required',
            'collage_id' => 'required',
            'speciale_id' => 'required',
        ]);
        $name = $request->name;
        $hours = $request->hours;
        $olduniversity_id = $request->olduniversity_id;
        $collage_id = $request->collage_id;
        $speciale_id = $request->speciale_id;

        $courses = (new Course)->create($request->all());

        // }
        // $courses->ycourses()->attach($request->ycourses);

        $ycourses = Ycourse::all();
        $specials =Special::find($speciale_id);
        $courses2 = $specials->courses;
        return view('courses.create2', compact('speciale_id', 'collage_id', 'olduniversity_id', 'ycourses','courses2'));
    }
    public function storecourse3(Request $request){
        $request->validate([
            'speciale_id' => 'required',
        ]);

        $speciale_id = $request->speciale_id;
        $ycourses = Ycourse::all();
        $specials =Special::find($speciale_id);
        $courses2 = $specials->courses;
        return view('courses.create2', compact('speciale_id','ycourses','courses2'));

    }


    public function storecourse2(Request $request){
        $request->validate([ 'ycourses' => 'required',
                             'courses2' => 'required',]);
        $serializedArrYcourses = serialize($request->ycourses);//for ycourses
        $serializedArrCourses  = serialize($request->courses2);//for courses
        // foreach ($request->ycourses as $key => $value) {
            DB::table('courses_ycourses')->insert(
                [
                    'course_id' => $serializedArrCourses,
                    'ycourse_id' => $serializedArrYcourses,
                ]
            );
            return 'sucsses';
    }

    public function courses2(Request $request)
    {
        $request->validate([
            'olduniversity_id' => 'required',
            'collage_id' => 'required',
            'speciale_id' => 'required',

        ]);
        $olduniversity_id = $request->olduniversity_id;
        $collage_id = $request->collage_id;
        $speciale_id = $request->speciale_id;

        $special = Special::find($speciale_id);
        $courses = $special->courses;
        $specialname = $special->name;
        $collage = Collage::find($collage_id);
        $collagename = $collage->name;
        $olduniversity = Olduniversity::find($olduniversity_id);
        $olduniversityname = $olduniversity->name;
        return view('courses.index', compact('courses'), compact('specialname', 'collagename', 'olduniversityname'));
    }

    public function storeyCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'hours' => 'required',
        ]);
        $name = $request->name;
        $hours = $request->hours;

        $courses = (new Course)->create($request->all());
        return redirect()->route('wel');
    }
    public function createyCourse()
    {
        return view('ycourses.create');
    }
    public function edit($id)
    {
        // $olduniversity = Olduniversity::all();
      //  $courses = Course::all();
        $ycourses = Ycourse::all();
        $courses = Course::find($id);
      //  $ycourses = Ycourse::find($id);
        return view('courses.edit', compact('courses','ycourses'));
    }
    public function update(Request $request, $id)
    {
        $courses = course::find($id);
        $request->validate([
            'name'=>'required',
            'hours'=>'required',

        ]);

        $courses -> name = $request->name;
        $courses -> hours = $request->hours;

        $courses ->save();
        $courses->ycourses()->sync($request->courses);

        return redirect()->route('wel')
        ->with('success','course updatet');

    }
    public function destroy(course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
        ->with('success','course deleted');
    }
    public function equal(){

        return view('equal');

    }
}
