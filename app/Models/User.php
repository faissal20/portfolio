<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Reply;
use App\Models\SystemLog;
use App\Models\Statistics;
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
}
