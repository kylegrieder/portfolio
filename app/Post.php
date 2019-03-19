<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month'])) {
            if ($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            }
        }
        if (isset($filters['year'])) {
            if ($year = $filters['year']) {
                $query->whereYear('created_at', Carbon::parse($year)->year);
            }
        }
    }
}
