<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'slug',
        'title',
        'developer',
        'publisher',
        'genres',
        'storyline',
        'release_year',
        'age_rating',
        'platforms',
        'modes',
        'size_gb',
        'languages',
        'rating',
        'cover',
        'screenshots',
    ];

    protected $casts = [
        'genres' => 'array',
        'platforms' => 'array',
        'modes' => 'array',
        'languages' => 'array',
        'screenshots' => 'array',
        'release_year' => 'integer',
        'rating' => 'float',
        'size_gb' => 'integer',
    ];
}
