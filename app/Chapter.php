<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsToMany(Book::class)->using(BookChapter::class);
    }
}
