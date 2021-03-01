<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
    'title',
    'body',
    'slug',
    ] ;

    public function getRouteKeyName()
    {
        # code...
        return 'slug';
    }
}
