<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Movie;
use App\Models\Reply;
use App\Models\Message;
use App\Models\SystemLog;
use App\Models\Statistics;
use App\Models\UserMovies;
use App\Models\DailyMessage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function statistics(){
        return $this->hasOne(Statistics::class);
    }

    public function dailyMessages(){
        return $this->hasMany(DailyMessage::class, 'user_id');
    }
    public function logs(){
        return $this->hasMany(SystemLog::class, 'user_id');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class)
            ->withPivot('watched', 'rating', 'review', 'watched_at')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'to');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from');
    }
}
