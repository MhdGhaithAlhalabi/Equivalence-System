<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Olduniversity;
use App\Models\Special;
use App\Models\Course;


class Collage extends Model
{
    use HasFactory;
    protected $table = "collages";
    protected $fillable = ['name','olduniversity_id'];
    protected $hidden =['created_at','updated_at'];

    public function olduniversity()
{
    return $this->belongsTo(Olduniversity::class, 'olduniversity_id', 'id');
}

public function special()
{
    return $this->hasMany(Special::class, 'collage_id','id');
}
public function courses()
{
    return $this->hasMany(Course::class, 'speciale_id','id');
}

}
