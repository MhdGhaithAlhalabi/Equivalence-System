<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collage;
use App\Models\Course;
class Olduniversity extends Model
{
    use HasFactory;
    protected $table = "olduniversities";
    protected $fillable = ['name'];
    protected $hidden =['created_at','updated_at'];

public function collage()
{
    return $this->hasMany(collage::class, 'olduniversity_id','id');
}
public function courses()
{
    return $this->hasMany(Course::class, 'speciale_id','id');
}


}
