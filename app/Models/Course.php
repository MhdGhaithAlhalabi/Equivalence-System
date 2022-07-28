<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Special;
use App\Models\Collage;
use App\Models\Olduniversity;

use App\Models\Ycourse;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";
    protected $fillable = ['name','hours','speciale_id','collage_id','olduniversity_id'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;

    public function special()
    {
        return $this->belongsTo(Special::class, 'speciale_id', 'id');
    }

    public function olduniversity()
    {
        return $this->belongsTo(Olduniversity::class, 'olduniversity_id', 'id');
    }

    public function collage()
    {
        return $this->belongsTo(Collage::class, 'collage_id', 'id');
    }

    public function ycourses()
    {
        return $this->belongsToMany(Ycourse::class, 'courses_ycourses', 'course_id', 'ycourse_id','id','id');
    }
}
