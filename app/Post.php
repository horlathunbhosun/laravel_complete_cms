<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];
    //
    public function author(){
        return  $this->belongsTo('App\User');
    }


    public function getImageUrlAttribute($value){
        $imageUrl = "";
        if(! is_null($this->image))
        {
            $imagePath = public_path() . '/img/' . $this->image;
            if(file_exists($imagePath)) $imageUrl = asset('/img/'. $this->image);
        }
        return $imageUrl;
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' :  $this->published_at->diffForHumans();
    }

    public function scopePublished($query){
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopeLastestFirst($query){
        return $query->orderBy('created_at', 'desc');
    }
}
