<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class Library extends Model
{
    use HasFactory;

    protected $table = 'library';
    
    protected $guarded = [];
}
