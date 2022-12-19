<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Book extends Model
{
    use HasFactory;
    use Uuids;

    protected $table = 'books';

    protected $guarded = [];

    public function chapter()
    {
        return $this->belongsToMany(Chapter::class)->orderBy('chapter_number')->using(BookChapter::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
