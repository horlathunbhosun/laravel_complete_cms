<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Post', 'author_id');
    }
    public function getBioHtmlAttribute($value){
        return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }

    public function gravatar(){
        $email = $this->email;
        $default = "https://res.cloudinary.com/horlathunbhosun/image/upload/v1524247081/avatar-user-coder-3579ca3abc3fd60f-512x512.png";
        $size = 100;
        return  "https://www.gravatar.com/avatar/" . md5( strtolower(trim( $email ))) . "?d=" . urlencode($default) . "&s=" . $size;
    }


    public function getRouteKeyName(){
        return 'slug';
    }
}
