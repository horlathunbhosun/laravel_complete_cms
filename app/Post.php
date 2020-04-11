<?php

namespace App;

use App\User;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['view_count', 'title' , 'slug' , 'author_id' , 'body' , 'image', 'excerpt' , 'category_id' , 'published_at'];
    protected $dates = ['published_at'];
    //
    public function author(){
        return  $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
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


    public function getImageThumbUrlAttribute($value){
        $imageUrl = "";
        if(! is_null($this->image))
        {
            $ext =  substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . '/img/' . $thumbnail;
            if(file_exists($imagePath)) $imageUrl = asset('/img/'. $thumbnail);
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

    public function scopeScheduled($query){
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query){
        return $query->whereNull("published_at");
    }



    public function scopeLastestFirst($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query){
        return $query->orderBy('view_count', 'desc');
    }

    public function getBodyHtmlAttribute($value){
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    // public function getExcerptAttribute($value){
    //     return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    // }

    public function dateFormatted($showTime = false){
        $format = "d/m/Y";
        if ($showTime) $format = $format . " " . "H:i:s";
        return $this->created_at->format($format);
    }

    public function publicationLabel(){
        if(! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
        }elseif($this->published_at && $this->published_at->isFuture()){
            return '<span class="label label-info">Schedule</span>';
        }else{
            return '<span class="label label-success">Published</span>';

        }
    }


}
