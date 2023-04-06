<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    function relationTocategory(){
        return $this->hasOne(category::class,'id','category_id');
    }
    function relationTosubcategory(){
        return $this->hasOne(Subcategory::class,'id','subcategory_id');
    }
}
