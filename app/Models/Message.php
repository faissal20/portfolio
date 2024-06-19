<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = ['from', 'to', 'content', 'type', 'seen'];

    public function from()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to' , 'id');
    }
    
}
