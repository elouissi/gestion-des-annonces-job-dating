<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{
       
    use HasFactory;
    use SoftDeletes;

    protected $table='announcements';
    protected $fillable=[
        "title","content","image","compagnie_id","user_id"
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class);
    }
 


    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_announcements');
    }
     public function users()  {

        return $this->belongsToMany(User::class,'applyment');
    }
}



