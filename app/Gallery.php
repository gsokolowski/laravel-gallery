<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes; // trait for soft deleting
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'image',
    ];
}
