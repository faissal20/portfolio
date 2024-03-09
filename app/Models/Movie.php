<?php

namespace App\Models;

use App\Models\User;
use App\Models\UserMovies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('watched', 'rating', 'review', 'watched_at')
            ->withTimestamps();
    }

}
