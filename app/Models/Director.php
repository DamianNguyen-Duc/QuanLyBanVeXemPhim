<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'birthday',
        'national',
        'content',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'directors_movies', 'director_id', 'movie_id');
    }
}
