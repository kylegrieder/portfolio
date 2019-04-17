<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'year',
        'overview',
        'poster_path',
        'release_date'
    ];

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }
}
