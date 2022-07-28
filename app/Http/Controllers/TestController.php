<?php

namespace App\Http\Controllers;

use App\Models\ProductCat;
use App\Models\Product;
use App\Models\Olduniversity;
use App\Models\Collage;
use App\Models\Course;
use App\Models\Special;
use App\Models\Ycourse;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class TestController extends Controller
{


    public function findolduniversityName(Request $request)
    {

        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = Collage::select('name', 'id')->where('Olduniversity_id', $request->id)->take(100)->get();
        return response()->json($data); //then sent this data to ajax success
    }
    public function findcollageName(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = Special::select('name', 'id')->where('collage_id', $request->id)->take(100)->get();


        return response()->json($data); //then sent this data to ajax success
    }
    public function   findspecialeName(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = Course::select('name', 'id')->where('speciale_id', $request->id)->take(100)->get();
        return response()->json($data); //then sent this data to ajax success
    }
    public function findOlduniversityId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = $request->id;
        return response()->json($data); //then sent this data to ajax success
    }
    public function findCollageId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = $request->id;
        return response()->json($data); //then sent this data to ajax success
    }
    public function findspecialId(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data = $request->id;
        return response()->json($data); //then sent this data to ajax success
    }
    public function findcourses(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data
        //$request->id here is the id of our chosen option id
        $data = Ycourse::select('name', 'id')->where('course_id', $request->id)->take(100)->get();

        return response()->json($data); //then sent this data to ajax success
    }




    public function findcourseName(Request $request)
    {


            $selectedRequest = serialize($request->selected); //get opject for id i selected
            $temp = 0;
            $i = 0 ;
            $request->selected; //get id for this select
            foreach($request->selected as $sel)
            {

                if($sel != $temp)
                {
                if(DB::table('courses_ycourses')->where('course_id', $selectedRequest)->count() > 0){
                $data = DB::table('courses_ycourses')->where('course_id', $selectedRequest)->get();//get all object from table brok
                $data1 = unserialize($data[$i]->ycourse_id);  //get id
                $data2 = unserialize($data[$i]->course_id);
                if($request->sel==1){
                  return  $data3 = Ycourse::whereIn('id',$data1)->get()->toArray();
                }
                else if($request->sel==2)
                {
                    return  $data4 = Course::whereIn('id',$data2)->get()->toArray();
                }
                //$data3 = Ycourse::whereIn('id',$data1)->get();  //get object information for this id
                //$data4 = Course::whereIn('id',$data2)->get(); //get object information for id i select
              // return  $array = array_merge($data3->toArray(), $data4->toArray()); //get array object informiton and last index object information for id i select
                    $i++;
            }
            else{
            return $array=[];
            }
            }



                    }



}

}


