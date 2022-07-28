<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OlduniversityController;
use App\Http\Controllers\ColagesController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\YcourseController;

use App\Models\Olduniversity;
use App\Models\Collage;
use App\Models\Special;
use App\Models\Ycourse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
############################welcome route ########################
Route::get('/', function () {
    $specials = Special::where('name','<>',null)->get();
    $Collages = Collage::where('name','<>',null)->get();
    $Olduniversites = Olduniversity::where('name','<>',null)->get();
    $selectedRole = Collage::first()->olduniversity_id;
    return view('welcome',compact('specials','Collages','Olduniversites','selectedRole'));
})->name('wel');
Route::get('/about', function () {
    return view('about');
})->name('about');
############################olduniversity route ########################
Route::resource('olduniversities', OlduniversityController::class);
############################collages route ########################
Route::resource('collages', ColagesController::class);
Route::get('collages/create',[ColagesController::class,'create'])->name('collages.create');
############################specials route########################
Route::resource('specials', SpecialController::class);
Route::get('index2',[SpecialController::class,'index2'])->name('specials.index2');
############################ycourses route########################
Route::resource('ycourses', YcourseController::class);
Route::get('ycourses/create/{special_id}',[YcourseController::class,'create'])->name('ycourses2.create');
############################releation one to many ########################
Route::get('olduniversity_has_many',[RelationController::class,'getOlduniversityCollage']);
Route::get('courses2',[RelationController::class,'courses'])->name('courses.index');
Route::get('courses/{special_id}/{collage_id}/{olduniversitie_id}',[RelationController::class,'createCourse'])->name('courses.create');
Route::post('courses/store',[RelationController::class,'storeCourse'])->name('courses.store');
Route::get('courses/edit/{id}',[RelationController::class,'edit'])->name('courses.edit');
Route::get('courses/equal',[RelationController::class,'equal']);
Route::post('courses/update/{id}',[RelationController::class,'update'])->name('courses.update');
Route::post('courses/store2',[RelationController::class,'storecourse2'])->name('courses.store2');
Route::post('courses/store3',[RelationController::class,'storecourse3'])->name('courses.store3');


############################TestController route ########################
Route::get('/findolduniversityName',[TestController::class,'findolduniversityName']);
Route::get('/findcollageName',[TestController::class,'findcollageName']);
Route::get('/findOlduniversityId',[TestController::class,'findOlduniversityId']);
Route::get('/findCollageId',[TestController::class,'findCollageId']);
Route::get('/findspecialId',[TestController::class,'findspecialId']);
Route::get('/findcourses',[TestController::class,'findcourses']);
Route::get('/findcourseName',[TestController::class,'findcourseName'])->name('findcourseName');


