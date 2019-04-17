<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = false;

    public function movie() {
        return $this->belongsToMany(Movie::class);
    }
}
