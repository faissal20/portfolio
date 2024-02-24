<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyMessage;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, DailyMessage $daily_message)
    {
        $request->validate([
            'message' => 'required|string'
        ]);


        $daily_message->replies()->create([
            'reply' => $request->message,
            'user_id' => $request->user()->id,
        ]);

        return response()->json(['message' => 'Reply has been saved!']);
    }
}
