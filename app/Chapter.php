<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Chapter extends Model
{
    use HasFactory;
    use Uuids;

    public function book()
    {
        return $this->belongsToMany(Book::class)->using(BookChapter::class);
    }
}
