<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookChapter extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'chapter_id'
     ];

    protected $table = 'book_chapter';
}
