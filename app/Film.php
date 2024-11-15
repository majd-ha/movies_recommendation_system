<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Http\Controllers\ContentTypes\Timestamp;

class Film extends Model
{
    protected $primaryKey = 'movieId';
    public $timestamps = false;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
        if ($filters['category'] ?? false) {
            $query->where('genres', 'like', '%' . request('category') . '%');
        }
    }
}
