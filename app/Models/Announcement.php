<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
   


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function compagnie()
    {
        return $this->belongsTo(Compagnie::class);
    }
    
    use HasFactory;
    protected $table='announcements';
    protected $fillable=[
        "title","content","compagnie_id","user_id"
    ];
}



