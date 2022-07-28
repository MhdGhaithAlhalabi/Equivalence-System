<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collage;

class Special extends Model
{
    use HasFactory;
    protected $table = "specials";
    protected $fillable = ['name','collage_id'];
    protected $hidden =['created_at','updated_at'];

    public function collage()
{
    return $this->belongsTo(Collage::class, 'collage_id', 'id');
}
public function courses()
{
    return $this->hasMany(Course::class, 'speciale_id','id');
}

}
