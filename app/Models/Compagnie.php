<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compagnie extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table='compagnies';
    protected $fillable=[
        "name","address","contact","field_of_activity"
    ];
    
    public function Announcement(){
        return $this->hasMany(Announcement::class);
    }



    public static function boot(){
        parent::boot();
        static::deleting(function(Compagnie $compagnie){
            $compagnie->Announcement()->delete();
        });
    }
    
}
