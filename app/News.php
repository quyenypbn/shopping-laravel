<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table= "news";
    public $timestamps = false;
     public $fillable = ['title','content','image'];
}