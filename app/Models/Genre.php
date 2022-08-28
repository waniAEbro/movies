<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ["id"];

    public function movies () {
        return $this->belongsToMany(Movie::class);
    }
}
