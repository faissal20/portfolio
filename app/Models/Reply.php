<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'daily_message_id',
        'reply',
        'seen',
        'seen_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyMessage()
    {
        return $this->belongsTo(DailyMessage::class);
    }

    public function markAsRead()
    {
        $this->is_read = true;
        $this->read_at = now();
        $this->save();
    }

    public function markAsUnread()
    {
        $this->is_read = false;
        $this->read_at = null;
        $this->save();
    }


}
