<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];
    protected $with = ["genres"];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
