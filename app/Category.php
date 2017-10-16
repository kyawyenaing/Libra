<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'desc', 'created_at', 'updated_at'];
    protected $table = 'categories';
}
