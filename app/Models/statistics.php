<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'heart_storage',
        'knowledge',
        'missing',
        'happiness',
        'made_for_each_other'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

}
