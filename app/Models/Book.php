<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'course_code',
        'price',
        'condition',
        'description',
        'photo_filename',
    ];
}
