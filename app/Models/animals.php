<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animals extends Model
{
    use HasFactory;

    protected $fillable=[
        
        "name",
        "description",
        "species",
        "habitat",
        "age",
        "weight",
        "height",
        "status",
        "thumb",
        "category_id"

    ];
}
