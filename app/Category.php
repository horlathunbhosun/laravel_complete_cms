<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = ['title', 'slug'];
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
