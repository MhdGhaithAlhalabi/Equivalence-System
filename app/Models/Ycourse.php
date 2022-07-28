<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class Ycourse extends Model
{
    use HasFactory;
    protected $table = "ycourses";
    protected $fillable = ['name','hours'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;

    /**
     * The roles that belong to the Ycourse
     *
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'courses_ycourses', 'ycourse_id', 'course_id','id','id');
    }
}
