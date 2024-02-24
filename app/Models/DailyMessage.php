<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'date',
        'seen',
        'seen_at'
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class) ;
    }
    
}
