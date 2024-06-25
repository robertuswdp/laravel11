<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model // pewarisan yang menghubungkan table posts
    {
        // protected $guarded = [];
        protected $fillable = ['title', 'author', 'slug', 'body'];
    }