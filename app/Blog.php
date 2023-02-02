<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'blog_name','blog_image','blog_desc','blog_title'
    ];
    protected $primaryKey = 'blog_id';
    protected $table = 'tbl_blog';
}
