<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnie extends Model
{
    use HasFactory;
    protected $table='compagnies';
    protected $fillable=[
        "name","address","contact","field_of_activity"
    ];}
