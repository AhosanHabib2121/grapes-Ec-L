<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home_blog_area extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
}
