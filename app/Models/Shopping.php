<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    function relationTocountry(){
        return $this->hasOne(Countrie::class,'id','country_id');
    }
}
