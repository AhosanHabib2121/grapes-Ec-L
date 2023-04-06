<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventorie extends Model
{
    use HasFactory;
    function relationTocolor(){
        return $this->hasOne(Color::class,'id','color_id');
    }
    function relationTosize(){
        return $this->hasOne(Size::class,'id','size_id');
    }
}
