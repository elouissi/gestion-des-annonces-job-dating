<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
     protected $table='skills';
    protected $fillable=[
        "name"
      ];

    public function User()  { 
        
        return $this->belongsToMany(User::class ,'skills_users' );
    }
    public function Announcement()  {

        return $this->belongsToMany(Announcement::class,'skills_announcements');
    }
}
